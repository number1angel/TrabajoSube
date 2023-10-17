<?php
namespace TrabajoSube;

class medioBoleto extends Tarjeta{
    private $tiempo;
    private $ultimoUso;
    private $today;
    private $cantidad;

    public function __construct(TiempoInterface $tiempo) {
        $this->tiempo = $tiempo; 
        $this->ultimoUso = 0;
        $this->cantidad = 4;
    }

    /*
    if($this->tiempo->weekday() !== "Sat" && $this->tiempo->weekday() !== "Sun"){
            if($this->tiempo->reloj24hs() >= 6 && $this->tiempo->reloj24hs() < 22){
               $this->updateSaldo(-$tarifa/2);;
            }
            $this->updateSaldo(-$tarifa);;
        }
        $this->updateSaldo(-$tarifa);;
    } LOS TESTS LO TIRAN MAL*/

    public function pagarTarifa($tarifa){
        $minuto = $this->tiempo->time();
        $day = $this->tiempo->day();
        if ($day == $this->today){
            if (($minuto - $this->ultimoUso >= 300)  && ($this->cantidad>=1)){
                //$this->horario($tarifa);
                $this->updateSaldo(-$tarifa/2);
                $this->cantidad--;
            }
            else{
                $this->updateSaldo(-$tarifa);
            }
        }
        else{
            $this->cantidad = 4;
            $this->cantidad--;
            $this->updateSaldo(-$tarifa/2);
        }
        $this->ultimoUso = $minuto;
        $this->today = $day;
    }
}

