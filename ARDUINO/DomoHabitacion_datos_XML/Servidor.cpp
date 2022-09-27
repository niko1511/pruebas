/*
  Servidor.cpp - Libreria creada por
  Juan Jose Nicolini programa control de
  domotica
*/

#include "Servidor.h"
#include "Sensors.h"

unsigned int localPort = 2390;
static const int NTP_PACKET_SIZE = 48; // NTP time stamp is in the first 48 bytes of the message

byte packetBuffer[NTP_PACKET_SIZE]; //buffer to hold incoming and outgoing packets

/* Don't hardwire the IP address or we won't get the benefits of the pool.
    Lookup the IP address for the host name instead */
//IPAddress timeServer(129, 6, 15, 28); // time.nist.gov NTP server
IPAddress timeServerIP; // time.nist.gov NTP server address
const char* ntpServerName = "time.nist.gov";

String json;

IPAddress ip(192, 168, 1, 39); //Node static IP
IPAddress gateway(192, 168, 1, 1);
IPAddress subnet(255, 255, 255, 0);
Servidor::Servidor() {}




//Check if header is present and correct
bool Servidor ::is_authentified() {
  Serial.println("Enter is_authentified");
  if (server.hasHeader("Cookie")) {
    Serial.print("Found cookie: ");
    String cookie = server.header("Cookie");
    Serial.println(cookie);
    if (cookie.indexOf("ESPSESSIONID=1") != -1) {
      Serial.println("Authentification Successful");
      return true;
    }
  }
  Serial.println("Authentification Failed");
  return false;
}

//*************login page, also called for disconnect
void Servidor ::handleLogin() {
  String msg;
  if (server.hasHeader("Cookie")) {
    Serial.print("Found cookie: ");
    String cookie = server.header("Cookie");
    Serial.println(cookie);
  }
  if (server.hasArg("DISCONNECT")) {
    Serial.println("Disconnection");
    String header = "HTTP/1.1 301 OK\r\nSet-Cookie: ESPSESSIONID=0\r\nLocation: /login\r\nCache-Control: no-cache\r\n\r\n";
    server.sendContent(header);
    return;
  }
  if (server.hasArg("USERNAME") && server.hasArg("PASSWORD")) {
    if (server.arg("USERNAME") == "admin" &&  server.arg("PASSWORD") == "admin" ) {
      String header = "HTTP/1.1 301 OK\r\nSet-Cookie: ESPSESSIONID=1\r\nLocation: /\r\nCache-Control: no-cache\r\n\r\n";
      server.sendContent(header);
      Serial.println("Log in Successful");
      return;
    }
    msg = "Wrong username/password! try again.";
    Serial.println("Log in Failed");
  }


  String content = "<html><body><form action='/login' method='POST'><h1>Login</h1><br>";
  content += "<input type='text' name='USERNAME' placeholder='user name'><br>";
  content += "<input type='password' name='PASSWORD' placeholder='password'><br>";
  content += "<input type='submit' name='SUBMIT' value='Submit'></form><br>";
  content += "</body></html>";


  server.send(200, "text/html", content);
}
// FIN  handleLogin
//*********************root page can be accessed only if authentification is ok
void Servidor ::handleRoot() {
  Serial.println("Enter handleRoot");
  String header;
  if (!is_authentified()) {
    String header = "HTTP/1.1 301 OK\r\nLocation: /login\r\nCache-Control: no-cache\r\n\r\n";
    server.sendContent(header);
    return;
  }
  String content = "<html><body><H2>hello, you successfully connected to esp8266!</H2><br>";
  if (server.hasHeader("User-Agent")) {
    content += "the user agent used is : " + server.header("User-Agent") + "<br><br>";
  }
  content += "You can access this page until you <a href=\"/login?DISCONNECT=YES\">disconnect</a></body></html>";
  server.send(200, "text/html", content);
}

//no need authentification
void Servidor ::handleNotFound() {
  String message = "File Not Found\n\n";
  message += "URI: ";
  message += server.uri();
  message += "\nMethod: ";
  message += (server.method() == HTTP_GET) ? "GET" : "POST";
  message += "\nArguments: ";
  message += server.args();
  message += "\n";
  for (uint8_t i = 0; i < server.args(); i++) {
    message += " " + server.argName(i) + ": " + server.arg(i) + "\n";
  }
  server.send(404, "text/plain", message);
}
//************CONEXION**************

void Servidor :: Conexion() {

  WiFi.begin(ssid, password);
  WiFi.config(ip, gateway, subnet);
  Serial.println("");

  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  ArduinoOTA.begin();

  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  udp.begin(localPort);

  UDP();

  delay(1000);


  server.on("/", handleRoot);
  server.on("/login", handleLogin);
  server.on("/persiana", persiana);
  server.on("/configuracion", configuracion);
  server.on("/json", Json);
  server.on("/xml", Xml);
  server.on("/inline", []() {
    server.send(200, "text/plain", "this works without need of authentification");
  });

  server.onNotFound(handleNotFound);
  //here the list of headers to be recorded
  const char * headerkeys[] = {"User-Agent", "Cookie"} ;
  size_t headerkeyssize = sizeof(headerkeys) / sizeof(char*);
  //ask server to track these headers
  server.collectHeaders(headerkeys, headerkeyssize );
  server.begin();
  Serial.println("HTTP server started");


}

void Servidor ::EscuhaServer() {

  server.handleClient();
}

//*******CONFIGURACION***********
void Servidor ::configuracion() {
  //***********TEMPERATURA************


  //***********TEMPERATURA************
  if (server.hasArg("temperatura") != NULL) {


    float temperature_22 = Sensors().temperature_22();
    char temperatureString[6];
    dtostrf(temperature_22, 2, 2, temperatureString);

    String title = "Temperatura";
    String cssClass = "mediumhot";

    if (temperature_22 < 0)
      cssClass = "cold";
    else if (temperature_22 > 20)
      cssClass = "hot";


    String message = "<!DOCTYPE html><html><head><title>" + title + "</title><meta charset=\"utf-8\" /><meta name=\"viewport\" content=\"width=device-width\" /><link href='https://fonts.googleapis.com/css?family=Advent+Pro' rel=\"stylesheet\" type=\"text/css\"><style>\n";
    message += "html {height: 100%;}";
    message += "div {color: #fff;font-family: 'Advent Pro';font-weight: 400;left: 50%;position: absolute;text-align: center;top: 50%;transform: translateX(-50%) translateY(-50%);}";
    message += "h2 {font-size: 90px;font-weight: 400; margin: 0}";
    message += "body {height: 100%;}";
    message += ".cold {background: linear-gradient(to bottom, #7abcff, #0665e0 );}";
    message += ".mediumhot {background: linear-gradient(to bottom, #81ef85,#057003);}";
    message += ".hot {background: linear-gradient(to bottom, #fcdb88,#d32106);}";
    message += "</style></head><body class=\"" + cssClass + "\"><div><h1>" + title +  "</h1><h2>" + temperatureString + "&nbsp;<small>&deg;C</small></h2></div></body></html>";

    server.send(200, "text/html", message);
  }//*************FIN TEMPERATURA*********

  //***************HORA**********

  if (server.hasArg("hora") != NULL && server.hasArg("minutos") != NULL) {
    String value_hora = server.arg("hora");
    String hora = value_hora;
    String value_minuto = server.arg("minutos");
    String minuto = value_minuto;
    Reloj(int(atoi(hora.c_str())), int(atoi(minuto.c_str())));

    server.send(200, "text/plain", "Cambios realizados");
  }//*********** FIN HORA *********


  if (server.hasArg("actualizarhora") != NULL) {
    UDP();

    server.send(200, "text/plain", "Cambios realizados");
  }//*********** FIN HORA *********


  //***************HORA INTERNA**********

  if (server.hasArg("horainterna") == NULL) {
    Reloj r;


    int Valor1 = r.Hora();
    int Valor2 = r.Minutos();
    String cont = "<div id='reloj'>";
    cont += Valor1;
    cont += ":";
    cont += Valor2;
    cont += "</div>";




    server.send(200, "text/html", cont);

  }//*********** FIN HORA INTERNA*********

}// ***FIN CONFIGURACION**********

////*************  CONTROL PERSIANA *******************


void Servidor ::persiana() {
  /*/ *****Comprobamos autenticacion******
    if (!is_authentified()) {
    String header = "HTTP/1.1 301 OK\r\nLocation: /login\r\nCache-Control: no-cache\r\n\r\n";
    server.sendContent(header);
    return;
    }// ******fin*******/

  //*********HORA SUBIDA DE PERSIANA*******

  if (server.hasArg("horaup") != NULL ) {
    String value = server.arg("horaup");
    String test = value;
    Configuracion().HoraUp = int(atoi(test.c_str()));

  }//*********** FIN HORA SUBIDA*********


  //*********HORA BAJADA DE PERSIANA*******

  if (server.hasArg("horadown") != NULL) {
    String value = server.arg("horadown");
    String test = value;
    Configuracion().HoraDown = int(atoi(test.c_str()));


  }//*********** FIN HORA BAJADA*********


  if (server.hasArg("estado") != NULL) {




    String cont = "<div id='reloj'>";
    cont += "El estado de la persiana esta al: ";
    cont += Configuracion().getPosicion();
    cont += "% abierta";
    cont += "</div>";

    server.send(200, "text/html", cont);


  }

  if (server.hasArg("posicion") != NULL) {

    String value = server.arg("posicion");
    int A = int(atoi(value.c_str()));
    Configuracion().setPosicion(A);


  }

  //*********** MOVIMIENTO PERSIANA*********
  if (server.hasArg("persiana") != NULL) {


    if (server.arg("persiana") == "stop") {
      Configuracion().tiempo = Configuracion().c_timer;
      Persiana(STOP);
      Serial.println("Persiana Stop");

    }

    if (server.arg("persiana") == "subir" && server.hasArg("timer") != NULL) {

      Persiana(SUBIR);
      Serial.println("Persiana Subiendo");

      String value_timer = server.arg("timer");
      String test_timer = value_timer;
      Configuracion().c_timer = Configuracion().tiempo;
      Configuracion().tiempo += int(atoi(test_timer.c_str()));

    }

    if (server.arg("persiana") == "bajar" && server.hasArg("timer") != NULL) {

      Persiana(BAJAR);
      Serial.println("Persiana Bajando");

      String value_timer = server.arg("timer");
      String test_timer = value_timer;
      Configuracion().c_timer = Configuracion().tiempo;
      Configuracion().tiempo -= int(atoi(test_timer.c_str()));

    } // *****FIN MOVIMIENTO PERSIANA*******




  }


  //*********** MOVIMIENTO MANDO*********
  if (server.hasArg("mando") != NULL) {

    if (server.arg("mando") == "stop") {
      Persiana(MANDOSTOP);
    }

    if (server.arg("mando") == "subir") {
      Persiana(MANDOSUBIR);
    }

    if (server.arg("mando") == "bajar") {
      Persiana(MANDOBAJAR);
    } // *****FIN MOVIMIENTO MANDO*******


  }
  server.send(200, "text/plain", "Cambios realizados");


}

///************************

// send an NTP request to the time server at the given address
unsigned long sendNTPpacket(IPAddress& address) {

  Serial.println("sending NTP packet...");
  // set all bytes in the buffer to 0
  memset(packetBuffer, 0, NTP_PACKET_SIZE);
  // Initialize values needed to form NTP request
  // (see URL above for details on the packets)
  packetBuffer[0] = 0b11100011;   // LI, Version, Mode
  packetBuffer[1] = 0;     // Stratum, or type of clock
  packetBuffer[2] = 6;     // Polling Interval
  packetBuffer[3] = 0xEC;  // Peer Clock Precision
  // 8 bytes of zero for Root Delay & Root Dispersion
  packetBuffer[12] = 49;
  packetBuffer[13] = 0x4E;
  packetBuffer[14] = 49;
  packetBuffer[15] = 52;

  // all NTP fields have been given values, now
  // you can send a packet requesting a timestamp:
  udp.beginPacket(address, 123); //NTP requests are to port 123
  udp.write(packetBuffer, NTP_PACKET_SIZE);
  udp.endPacket();


}



void Servidor :: UDP() {

  //get a random server from the pool
  WiFi.hostByName(ntpServerName, timeServerIP);

  sendNTPpacket(timeServerIP); // send an NTP packet to a time server
  // wait to see if a reply is available
  delay(1000);

  int cb = udp.parsePacket();

  // We've received a packet, read the data from it
  udp.read(packetBuffer, NTP_PACKET_SIZE); // read the packet into the buffer


  //the timestamp starts at byte 40 of the received packet and is four bytes,
  // or two words, long. First, esxtract the two words:

  unsigned long highWord = word(packetBuffer[40], packetBuffer[41]);
  unsigned long lowWord = word(packetBuffer[42], packetBuffer[43]);
  // combine the four bytes (two words) into a long integer
  // this is NTP time (seconds since Jan 1 1900):
  unsigned long secsSince1900 = highWord << 16 | lowWord;
  Serial.print("Seconds since Jan 1 1900 = ");
  Serial.println(secsSince1900);


  // now convert NTP time into everyday time:
  Serial.print("Unix time = ");
  // Unix time starts on Jan 1 1970. In seconds, that's 2208988800:
  const unsigned long seventyYears = 2208988800UL;
  // subtract seventy years:
  unsigned long epoch = secsSince1900 - seventyYears;
  // print Unix time:
  Serial.println(epoch);

  int Hora = (epoch % 86400L) / 3600 + 1;
  int Minutos = (epoch % 3600) / 60;
  int Segundos = epoch % 60;

  Reloj(Hora, Minutos, Segundos);

}

void Servidor ::Json() {

  /*Se crea el json que pasara todos los valores a una url para poder leer luego*/
  String json = "{\"json\":[{";

  json += "\"HoraActual\":";
  json += Reloj().HoraActual();
  json += ",";
  json += "\"HoraUp\":";
  json += Configuracion().HoraUp;
  json += ",";
  json += "\"HoraDown\":";
  json += Configuracion().HoraDown;
  json += ",";
  json += "\"UMBRAL\":";
  json += Configuracion().UMBRAL;
  json += ",";
  json += "\"TRP\":";
  json += Configuracion().TRP;
  json += ",";
  json += " \"temperature_22\":";
  json += Sensors().temperature_22();
  json += ",";
  json += " \"temperature_11\":";
  json += Sensors().temperature_11();
  json += ",";
  json += " \"READING_LIGHT\":";
  json += READING_LIGHT;
  json += ",";
  json += " \"getPosicion\":";
  json += Configuracion().getPosicion();

  json += " }]}";


  server.send(200, "text/html", json);
}


void Servidor ::Xml() {

  String xml = "<dormitorio ver='1.0'>";
  xml += "  <head>";
 xml += "<HoraUp>";
  xml += Configuracion().HoraUp;
  xml += "</HoraUp>";


  xml += "<HoraActual>";
  xml += Reloj().HoraActual();
  xml += "</HoraActual>";
  xml += "<HoraDown>";
  xml += Configuracion().HoraDown;
  xml += "</HoraDown>";
  xml += "<UMBRAL>";
  xml += Configuracion().UMBRAL;
  xml += "</UMBRAL>";
  xml += "<temperature_22>";
  xml += Sensors().temperature_22();
  xml += "</temperature_22>";
  xml += "<temperature_11>";
  xml += Sensors().temperature_11();
  xml += "</temperature_11>";
  xml += "<READING_LIGHT>";
  xml += READING_LIGHT;
  xml += "</READING_LIGHT>";
  xml += "<getPosicion>";
  xml += Configuracion().getPosicion();
  xml += "</getPosicion>";
  xml += "</head>";
  xml += "</dormitorio>";
  server.send(200, "text/xml", xml);
}

