<?php
namespace TrabajoSube;

class medioBoleto extends Tarjeta{
    protected $tiempo;
    protected $ultimoUso;

    public function __construct(TiempoInterface $tiempo) {
        $this->tiempo = $tiempo; 
        $this->ultimoUso = 0;
    }

    public function pagarTarifa($tarifa){
        $tiempo = $this->tiempo->time(); 
        if ($tiempo - $this->ultimoUso >= 300){
            $this->updateSaldo(-$tarifa/2);
        }
        else{
            $this->updateSaldo(-$tarifa);
        }
        $this->ultimoUso = $tiempo;
    }
}

