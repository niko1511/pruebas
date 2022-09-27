#ifndef SENSORS_H
#define SENSORS_H

#include "Configuracion.h"
#include "DHT.h"


static DHT dht_11(PIN_TEMPERATURE_DHT11, DHT11);
static  DHT dht_22(PIN_TEMPERATURE_DHT22, DHT22);
class Sensors {

  private:

  public:
    float humidity_11();
    float temperature_11();
    float humidity_22();
    float temperature_22();

};
#endif //SENSORS_H
