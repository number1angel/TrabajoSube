<?php
namespace TrabajoSube;

class boletoGratuito extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(0);
    }
}
