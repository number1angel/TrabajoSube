<?php
namespace TrabajoSube;

class BoletoGratuito extends Tarjeta
{
    private $tiempo;
    private $cantidad;
    private $ultimoDia;

    public function __construct(TiempoInterface $tiempo){
        $this->tiempo = $tiempo;
        $this->cantidad = 0;
        $this->ultimoDia = $tiempo->day();
    }

    /*
    public function horario($tarifa){
        if($this->tiempo->weekday() !== "Sat" && $this->tiempo->weekday() !== "Sun"){
            if($this->tiempo->reloj24hs() >= 6 && $this->tiempo->reloj24hs() < 22){
                $this->updateSaldo(0);
            }
            $this->updateSaldo(-$tarifa);
        }
        $this->updateSaldo(-$tarifa);
    }NO ANDA TESTS*/

    public function pagarTarifa($tarifa)
    {
        $today = $this->tiempo->day();
        if ($today !== $this->ultimoDia) {
            $this->cantidad = 0;
            $this->ultimoDia = $today;
        }

        if ($this->cantidad < 2) {
            $this->updateSaldo(0);
            $this->cantidad++;
        } else {
            $this->updateSaldo(-$tarifa);
        }
    }
}

class BoletoGratuitoJubilado extends Tarjeta
{
    public function pagarTarifa($tarifa)
    {
            $this->updateSaldo(0);
        }
}