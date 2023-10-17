<?php
namespace TrabajoSube;

class BoletoGratuito extends Tarjeta
{
    private $viajesGratuitosHoy;
    private $ultimoDia;

    public function __construct()
    {
        $this->viajesGratuitosHoy = 0;
        $this->ultimoDia = date('d');
    }

    public function pagarTarifa($tarifa)
    {
        $hoy = date('d');
        if ($hoy !== $this->ultimoDia) {
            $this->viajesGratuitosHoy = 0;
            $this->ultimoDia = $hoy;
        }

        if ($this->viajesGratuitosHoy < 2) {
            $this->updateSaldo(0);
            $this->viajesGratuitosHoy++;
        } else {
            $this->updateSaldo(-$tarifa);
        }
    }
}