#ifndef RELOJ_H
#define RELOJ_H

#include "Configuracion.h"
#include <Ethernet.h>

static int  _HORA;
static int  _MINUTOS;
static int  _SEGUNDOS;

class Reloj {

   

  public:
    Reloj(int H, int M, int S);
    Reloj(int H, int M);
    Reloj();
    int HoraActual();
    int Hora();
    int Minutos();
    int Segundos();
    

  private:



};
#endif //RELOJ_H
