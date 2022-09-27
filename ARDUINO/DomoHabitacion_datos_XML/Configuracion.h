#ifndef CONFIGURACION_H
#define CONFIGURACION_H

#include "Persiana.h"

static const char* ssid = "MiFibra-645F";//type your ssid
static const char* password = "AWA4pN37";//type your password


//************ no tocar**************

static bool IDEMUP;
static bool IDEMDOWN;





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


struct Configuracion {
    // Aqui solo la declaracion
  public:
    static int tiempo;
    static int HoraUp;
    static int HoraDown ;
    static int UMBRAL;
    static int TRP;  // Tiempo que tarda en subir la persiana
    static bool ESTADO_PERSIANA;
    static int c_timer;

    static int setPosicion(int value);
    static int getPosicion();
  private:

};


#endif //CONFIGURACION_H
