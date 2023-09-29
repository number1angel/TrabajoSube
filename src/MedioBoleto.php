<?php
namespace TrabajoSube;

class medioBoleto extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(-$tarifa/2);
    }
}