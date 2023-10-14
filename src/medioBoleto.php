<?php
namespace TrabajoSube;

class medioBoleto extends Tarjeta{
    
    public function __construct() {
        $this->ultimoUso = 0;
    }
    
    public function pagarTarifa($tarifa){
        if (time() - $this->ultimoUso >= 300){
            $this->updateSaldo(-$tarifa/2);
        }
        else{
            $this->updateSaldo(-$tarifa);
        }
        $this->ultimoUso = time();
    }
}
