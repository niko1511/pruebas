
#ifndef SERVIDOR_H
#define SERVIDOR_H


#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include "Configuracion.h"
#include "Persiana.h"
#include "Reloj.h"
#include "Sensors.h"
#include <WiFiUdp.h>
#include <ArduinoOTA.h>
static ESP8266WebServer server(80);


static WiFiUDP udp;

class Servidor {
  public:

    Servidor();


    static void Conexion();
    static void EscuhaServer();
  private:

    static void handleNotFound();
    static void handleRoot();
    static void handleLogin();
    static bool is_authentified();
    static void persiana();
    static void configuracion();
    static void UDP();
    static void Json();
     static void Xml();
   

};

#endif //SERVIDOR_H
