#ifndef PERSIANA_H
#define PERSIANA_H


#include "Configuracion.h"
#include "Ethernet.h"


class Persiana {
  public:

    Persiana(byte type);
    Persiana();
    static bool PERSIANA_ACTIVA();
    static bool PERSIANA_ACTIVA(boolean value);


    ~Persiana();
  private:

    void Subir();
    void Bajar();
    void Stop();

    void MandoSubir();
    void MandoBajar();
    void MandoStop();


};


#endif //PERSIANA_H
