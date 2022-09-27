
/*
  Control domotica
  Juan Jose Nicolini
*/


#include "Configuracion.h"
#include "Sensors.h"
#include "Reloj.h"
#include "Persiana.h"
#include "Servidor.h"



Reloj reloj(22, 15, 50); // Inicio Reloj con hora , minutos, segundos
Servidor servidor; // Iniciamos el constructor de la conexion a internet
Persiana p;
void setup() {
  pinMode(PIN_RELE_UP, OUTPUT);
  pinMode(PIN_RELE_DOWN, OUTPUT);
  pinMode(PIN_UP, OUTPUT);
  pinMode(PIN_STOP, OUTPUT);
  pinMode(PIN_DOWN, OUTPUT);
  pinMode(PIN_RELE_LIGHT, OUTPUT);

  Serial.begin(115200);

  servidor.Conexion();



  /***************************/
}

void loop() {




  servidor.EscuhaServer();
  ArduinoOTA.handle();

  Serial.println(READING_LIGHT);

  if (READING_LIGHT < Configuracion().UMBRAL) {
    /*se activara un contador de tiempo por x segundos*/
    //se enciende la luz porque esta oscuro

  }
  else {
    // hay luz entonces se apaga la luz
  }

  Reloj();

  delay(726); /* no cambiar el retardo mantiene los segundos sincronizados*/



  Serial.print("Humidity 22: ");
  Serial.print(Sensors().humidity_22());
  Serial.print(" %\t");
  Serial.print("Temperature 22: ");
  Serial.print(Sensors().temperature_22());
  Serial.println(" *C ");

  Serial.print("Humidity 11: ");
  Serial.print(Sensors().humidity_11());
  Serial.print(" %\t");
  Serial.print("Temperature 11: ");
  Serial.print(Sensors().temperature_11());
  Serial.println(" *C ");


  Serial.print(reloj.Hora());
  Serial.print(":");
  Serial.print(reloj.Minutos());
  Serial.print(":");
  Serial.println(reloj.Segundos());




  //**********PERSIANA ***************
  if (p.PERSIANA_ACTIVA() == true) {


    if (Configuracion().tiempo < 0) { /*marcamos el limite de*/
      Configuracion().tiempo = 0;     /*bajar la persiana*/
    }
    if (Configuracion().tiempo > Configuracion().TRP) {   /*marcamos el limite de*/
      Configuracion().tiempo = Configuracion().TRP; /*hasta donde subir la persiana*/
    }


    if (Configuracion().c_timer == Configuracion().tiempo) {
      Persiana(STOP);
      // c_timer = 0;
      //Configuracion().tiempo = 15;
      Serial.println("persiana Stop");
      p.PERSIANA_ACTIVA(false);

    } else {
      if (Configuracion().ESTADO_PERSIANA == true) {
        Configuracion().c_timer++;
      } else {
        Configuracion().c_timer--;
      }
      Serial.println(Configuracion().c_timer);
    }

  } // ******FIN PERSIANA*********

  Serial.println(Configuracion().tiempo);

  //*********** PERSIANA HORA UP***********
  if (Configuracion().HoraUp == reloj.HoraActual() && IDEMUP == true) {
    IDEMUP = false;
    // Persiana(SUBIR);
    Configuracion().setPosicion(50);
    Serial.println("SUBIENDO");

  } else {
    if (Configuracion().HoraUp != reloj.HoraActual()) {
      IDEMUP = true;
    }
  } //******** FIN PERSIANA HORA UP**************


  //*********** PERSIANA HORA DONW***********
  if (Configuracion().HoraDown == reloj.HoraActual() && IDEMDOWN == true) {
    IDEMDOWN = false;
    // Persiana(BAJAR);
    Configuracion().setPosicion(0);
    Serial.println("BAJANDO");

  } else {
    if (Configuracion().HoraDown != reloj.HoraActual()) {
      IDEMDOWN = true;
    }
  } //******** FIN PERSIANA HORA DOWN**************


}

//*********************METODOS ******************************




