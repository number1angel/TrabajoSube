<?php
namespace TrabajoSube;

class franquicia_completa extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(0);
    }
}
