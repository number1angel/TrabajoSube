<?php
namespace TrabajoSube;

class BoletoGratuito extends Tarjeta
{
    private $cantidad;
    private $ultimoDia;

    public function __construct()
    {
        $this->cantidad = 0;
        $this->ultimoDia = date('d');
    }

    public function pagarTarifa($tarifa)
    {
        $today = date('d');
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