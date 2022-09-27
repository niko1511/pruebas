/*
  Reloj.cpp - Libreria creada por
  Juan Jose Nicolini programa control de
  domotica
*/

#include "Reloj.h"

Reloj::Reloj(int H, int M, int S) {

  _HORA = H;
  _MINUTOS = M;
  _SEGUNDOS = S;
}

Reloj::Reloj(int H, int M) {

  _HORA = H;
  _MINUTOS = M;

}
Reloj::Reloj() {

  if (_SEGUNDOS > 59) {

    _MINUTOS++;
    _SEGUNDOS = 0;
  }
  if (_MINUTOS > 59) {

    _HORA++;
    _MINUTOS = 0;
  }

  if (_HORA > 23) {
    _HORA = 0;
  }
  _SEGUNDOS++;
}




int Reloj::HoraActual() {
  int HoraActual = _HORA * 100 + _MINUTOS;

  return HoraActual;
}

int Reloj::Hora() {
  return _HORA;
}
int Reloj::Minutos() {
  return _MINUTOS;
}
int Reloj::Segundos() {
  return _SEGUNDOS;
}


