#include "Sensors.h"

//Lee Temperatura Sensor DHT11
float Sensors:: humidity_11(){
  return dht_11.readHumidity();
}
float Sensors:: temperature_11(){
  return dht_11.readTemperature()-1;
}

//Lee Temperatura Sensor DHT22
float Sensors:: humidity_22(){
  return dht_22.readHumidity();
}
float Sensors:: temperature_22(){
  return dht_22.readTemperature();
}
