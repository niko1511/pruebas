/*************************************************************
  Download latest Blynk library here:
    https://github.com/blynkkk/blynk-library/releases/latest

  Blynk is a platform with iOS and Android apps to control
  Arduino, Raspberry Pi and the likes over the Internet.
  You can easily build graphic interfaces for all your
  projects by simply dragging and dropping widgets.

    Downloads, docs, tutorials: http://www.blynk.cc
    Sketch generator:           http://examples.blynk.cc
    Blynk community:            http://community.blynk.cc
    Follow us:                  http://www.fb.com/blynkapp
                                http://twitter.com/blynk_app

  Blynk library is licensed under MIT license
  This example code is in public domain.

 *************************************************************
  This example runs directly on ESP8266 chip.

  Note: This requires ESP8266 support package:
    https://github.com/esp8266/Arduino

  Please be sure to select the right ESP8266 module
  in the Tools -> Board menu!

  Change WiFi ssid, pass, and Blynk auth token to run :)
  Feel free to apply it to any other example. It's simple!
 *************************************************************/

/* Comment this out to disable prints and save space */
#define BLYNK_PRINT Serial


#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>
#include <ArduinoOTA.h>

#define BLYNK_PRINT Serial
#define BLYNK_DEFAULT_PORT 80

// You should get Auth Token in the Blynk App.
// Go to the Project Settings (nut icon).
char auth[] = "143b4fd69c4b4f93a62b26fdf4e600c0";

char ssid[] = "MiFibra-645F";
char pass[] = "AWA4pN37";


#define PIN_RELE_UP 2
#define PIN_RELE_DOWN 0
#define PIN_UP 12
#define PIN_STOP 4
#define PIN_DOWN 5
#define PIN_RELE_LIGHT 13
#define PIN_TEMPERATURE_DHT22 14
#define PIN_TEMPERATURE_DHT11 16

#define READING_LIGHT analogRead(A0)


#define APAGADO  LOW
#define ENCENDIDO  HIGH


#define SUBIR 2
#define BAJAR 1
#define STOP 0
#define MANDOSUBIR 5
#define MANDOBAJAR 4
#define MANDOSTOP 3

//****CONFIGURACION********
int DELAY_TIMER = 350;
boolean ACTIVO = false;
boolean REINICIO = true;
boolean FINDECARRERRA = false;

//*****FIN CONFIGURACION****
int pinV1,pinV2,pinV3,pinV4;
int valP1,valP2;
WidgetLED ledSubir(V5);
WidgetLED ledStop(V6);
WidgetLED ledAbajo(V7);
WidgetTerminal terminal(V0);

BLYNK_CONNECTED(){
  Blynk.syncVirtual(V1);
 // Blynk.syncVirtual(V2);
 // Blynk.syncVirtual(V3);
 //Blynk.syncVirtual(V4);
}

BLYNK_WRITE(V0){

  // if you type "Marco" into Terminal Widget - it will respond: "Polo:"
  if (String("Marco") == param.asStr()) {
    terminal.println("You said: 'Marco'") ;
    terminal.println("I said: 'Polo'") ;
  } else {

    // Send it back
    terminal.print("You said:");
    terminal.write(param.getBuffer(), param.getLength());
    terminal.println();
  }

  // Ensure everything is sent
  terminal.flush();
}

BLYNK_WRITE(V1){
pinV1 = param.asInt(); // assigning incoming value from pin V1 to a variable

 
}
BLYNK_WRITE(V2){
pinV2 = param.asInt(); // assigning incoming value from pin V1 to a variable

 
}
BLYNK_WRITE(V3){
pinV3 = param.asInt(); // assigning incoming value from pin V1 to a variable

 
}
BLYNK_WRITE(V4){
pinV4 = param.asInt(); // assigning incoming value from pin V1 to a variable

 
}
void setup()
{

  pinMode(PIN_RELE_UP, OUTPUT);
  pinMode(PIN_RELE_DOWN, OUTPUT);
  pinMode(PIN_UP, OUTPUT);
  pinMode(PIN_STOP, OUTPUT);
  pinMode(PIN_DOWN, OUTPUT);
  pinMode(PIN_RELE_LIGHT, OUTPUT);
 
  // Debug console
  Serial.begin(115200);

  Blynk.begin(auth, ssid, pass);

   Serial.println("Booting");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, pass);
  while (WiFi.waitForConnectResult() != WL_CONNECTED) {
    Serial.println("Connection Failed! Rebooting...");
    delay(5000);
    ESP.restart();
  }
  
  // Port defaults to 8266
  // ArduinoOTA.setPort(8266);

  // Hostname defaults to esp8266-[ChipID]
  // ArduinoOTA.setHostname("myesp8266");

  // No authentication by default
  // ArduinoOTA.setPassword("admin");

  // Password can be set with it's md5 value as well
  // MD5(admin) = 21232f297a57a5a743894a0e4a801fc3
  // ArduinoOTA.setPasswordHash("21232f297a57a5a743894a0e4a801fc3");

  ArduinoOTA.onStart([]() {
    String type;
    if (ArduinoOTA.getCommand() == U_FLASH) {
      type = "sketch";
    } else { // U_SPIFFS
      type = "filesystem";
    }

    // NOTE: if updating SPIFFS this would be the place to unmount SPIFFS using SPIFFS.end()
    Serial.println("Start updating " + type);
  });
  ArduinoOTA.onEnd([]() {
    Serial.println("\nEnd");
  });
  ArduinoOTA.onProgress([](unsigned int progress, unsigned int total) {
    Serial.printf("Progress: %u%%\r", (progress / (total / 100)));
  });
  ArduinoOTA.onError([](ota_error_t error) {
    Serial.printf("Error[%u]: ", error);
    if (error == OTA_AUTH_ERROR) {
      Serial.println("Auth Failed");
    } else if (error == OTA_BEGIN_ERROR) {
      Serial.println("Begin Failed");
    } else if (error == OTA_CONNECT_ERROR) {
      Serial.println("Connect Failed");
    } else if (error == OTA_RECEIVE_ERROR) {
      Serial.println("Receive Failed");
    } else if (error == OTA_END_ERROR) {
      Serial.println("End Failed");
    }
  });
  ArduinoOTA.begin();
  Serial.println("Ready");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());


//***************TERMINAL**********
// Clear the terminal content
  terminal.clear();

  // This will print Blynk Software version to the Terminal Widget when
  // your hardware gets connected to Blynk Server
  terminal.println(F("Blynk v" BLYNK_VERSION ": Device started"));
  terminal.println(F("-------------"));
  terminal.println(F("Type 'Marco' and get a reply, or type"));
  terminal.println(F("anything else and get it printed back."));
  terminal.flush();

//****************FIN***********
  
}

void loop(){

// si se reinicia sistema lee la ultima configuracion
if (REINICIO == true){

Serial.println("SISTEMA REINICIADO");
terminal.println("SISTEMA REINICIADO");
terminal.flush();
 Blynk.virtualWrite(V2, HIGH);//PONEMOS VALORES A 1
 Blynk.virtualWrite(V3, HIGH);//PONEMOS VALORES A 1
 Blynk.virtualWrite(V4, HIGH);//PONEMOS VALORES A 1
  pinV2=HIGH;
  pinV3=HIGH;
  pinV4=HIGH;
  valP1=pinV1;
  REINICIO = false;
  FINDECARRERRA=true;
}//FIN REINICIO

  
  ArduinoOTA.handle();
  Blynk.run();

delay(DELAY_TIMER); // tiempo que tarda en dar el loop
PinPersiana();          
LedPersiana();





if(valP1 != pinV1 && ACTIVO== true){
  ProgressBar();
 
  
}
if(valP1 == pinV1 && ACTIVO!= true){
   Stop();
    
   Serial.println("Progress bar completado");
   terminal.println("Progress bar completado");
   terminal.flush();
}

}








//*****************CODIGOS**************

void ProgressBar(){

   if(valP1<pinV1){
   Subir();
    Serial.println("subiendo valor");
     terminal.println("subiendo valor");
   terminal.flush();
  }
  if(valP1>pinV1){
   Bajar();
   
    Serial.println("bajando valor");
     terminal.println("bajando valor");
   terminal.flush();
  }
  

Serial.println(valP1);
Serial.println(pinV1);
  terminal.println(valP1);
  terminal.println(pinV1);
   terminal.flush();

if( FINDECARRERRA== true){
  int valX = valP1; // recupero el ultimo valor tomado
  valP1 = pinV1; // le asigno nuevo valor de parada
 Blynk.virtualWrite(V1, valX); // actualizo la barra al ultimo valor
pinV1 = valX; //actualizo la ultima variabe 
 FINDECARRERRA=false;
 Serial.println("ACTIVO FALSO");
  terminal.println("ACTIVO FALSO");
   terminal.flush();
}
}



void PinPersiana(){

  if(pinV2 == LOW ){
 Subir();
 pinV2=HIGH;
 Blynk.virtualWrite(V2, HIGH);
}

if(pinV3 == LOW ){
 Stop();
 pinV3=HIGH;
 Blynk.virtualWrite(V3, HIGH);
}

if(pinV4 == LOW ){
 Bajar();
 pinV4=HIGH;
 
 Blynk.virtualWrite(V4, HIGH);
}
}

void LedPersiana(){

ledSubir.off();
ledStop.off();
ledAbajo.off();


 if(digitalRead(PIN_RELE_DOWN)==HIGH){
   Serial.println("LED ENCENDIDO ABAJO");
   terminal.println("LED ENCENDIDO ABAJO");
   terminal.flush();
  ledAbajo.on();
   Blynk.virtualWrite(V1, pinV1--);
  
  
 }
 if(digitalRead(PIN_RELE_UP)==HIGH){
   Serial.println("LED ENCENDIDO SUBIR");
   terminal.println("LED ENCENDIDO SUBIR");
   terminal.flush();
  ledSubir.on();
   Blynk.virtualWrite(V1, pinV1++);
 
 }
  
}

void Subir() {
 
  digitalWrite(PIN_RELE_DOWN, APAGADO);
  digitalWrite(PIN_RELE_UP, ENCENDIDO);
  Serial.println("SUBIENDO");
   terminal.println("SUBIENDO");
   terminal.flush();
ACTIVO=false;
}

void Bajar() {
  
  digitalWrite(PIN_RELE_UP, APAGADO);
  digitalWrite(PIN_RELE_DOWN, ENCENDIDO);
  Serial.println("BAJANDO");
   terminal.println("BAJANDO");
   terminal.flush();
  ACTIVO=false;

}

void Stop() {

  digitalWrite(PIN_RELE_UP, APAGADO);
  digitalWrite(PIN_RELE_DOWN, APAGADO);

  Serial.println("PARADO");
  terminal.println("PARADO");
  terminal.flush();
   Blynk.virtualWrite(V2, HIGH);//PONEMOS VALORES A 1
   Blynk.virtualWrite(V3, HIGH);//PONEMOS VALORES A 1
   Blynk.virtualWrite(V4, HIGH);//PONEMOS VALORES A 1
   ledStop.on();
   valP1=pinV1;
   ACTIVO=true;
   FINDECARRERRA=true;

}
