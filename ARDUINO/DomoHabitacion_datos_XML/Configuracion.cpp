#include "Configuracion.h"


int Configuracion::tiempo = 0;
int Configuracion:: HoraUp = 1330;  // si el horario es de mañana hay que definir sin el primer 0
int Configuracion:: HoraDown = 1840; // por ejemplo seria 905 para 09:05hs
int Configuracion:: UMBRAL = 180;   // defenimos el limite que se enciende la luz
int Configuracion:: TRP = 31; // Tiempo que tarda en subir la persiana


int  Configuracion::c_timer = 31;


bool Configuracion:: ESTADO_PERSIANA = true;




int Configuracion::setPosicion(int A) {

  Configuracion().tiempo = Configuracion().c_timer;
  Persiana(STOP);
     Persiana(MANDOSTOP);
  
  double  B = (double)Configuracion().TRP / 96;
  int C = Configuracion().tiempo;

  int R = A / 10 * B * 10;
  Configuracion().tiempo = R;
  if (R < C) {

    Persiana(BAJAR);
    Persiana(MANDOBAJAR);
  } else {

    Persiana(SUBIR);
    Persiana(MANDOSUBIR);
  }

}
int Configuracion::getPosicion() {
  double  A = (double)Configuracion().TRP / 96;
  //int B = Configuracion().tiempo;
  int B = Configuracion().c_timer;
  int C = A * B;
  int Valor = (int)C * 10 ;



  return Valor;
}
