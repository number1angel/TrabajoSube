<?php
namespace TrabajoSube;

interface TiempoInterface {

    public function time();

}

class Tiempo implements TiempoInterface {

    public function time() {
        return time();
    }

}
    
class medioBoleto extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(-$tarifa/2);
    }
}
