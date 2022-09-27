/*
  Persiana.cpp - Libreria creada por
  Juan Jose Nicolini programa control de
  domotica
*/

#include "Persiana.h"

boolean EstadoPersiana = false;
Persiana ::Persiana() {}
Persiana::Persiana(byte type) {


  if (type == SUBIR ) {
    Subir();
    MandoSubir();
  }


  if (type == BAJAR ) {
    Bajar();
    MandoBajar();
  }
  if (type == STOP ) {
    Stop();
    MandoStop();
  }


  if (type == MANDOSUBIR ) {
    MandoSubir();
  }


  if (type == MANDOBAJAR ) {
    MandoBajar();
  }
  if (type == MANDOSTOP ) {
    MandoStop();
  }
}
//DEfinicion del destructor
Persiana::~Persiana() {}


void Persiana::Subir() {
  Configuracion().ESTADO_PERSIANA = true;
  digitalWrite(PIN_RELE_DOWN, APAGADO);
  digitalWrite(PIN_RELE_UP, ENCENDIDO);

  EstadoPersiana = true;


}

void Persiana::Bajar() {
  Configuracion().ESTADO_PERSIANA = false;
  digitalWrite(PIN_RELE_UP, APAGADO);
  digitalWrite(PIN_RELE_DOWN, ENCENDIDO);

  EstadoPersiana = true;

}

void Persiana::Stop() {

  digitalWrite(PIN_RELE_UP, APAGADO);
  digitalWrite(PIN_RELE_DOWN, APAGADO);

  EstadoPersiana = false;



}

bool Persiana ::PERSIANA_ACTIVA() {

  return EstadoPersiana;
}


bool Persiana ::PERSIANA_ACTIVA(boolean value) {

  EstadoPersiana = value;
}




void Persiana::MandoSubir() {

  digitalWrite(PIN_UP, ENCENDIDO);
  delay(200);
  digitalWrite(PIN_UP, APAGADO);


}

void Persiana::MandoBajar() {


  digitalWrite(PIN_DOWN, ENCENDIDO);
  delay(200);
  digitalWrite(PIN_DOWN, APAGADO);

}

void Persiana::MandoStop() {

  digitalWrite(PIN_STOP, ENCENDIDO);
  delay(200);
  digitalWrite(PIN_STOP, APAGADO);

}


