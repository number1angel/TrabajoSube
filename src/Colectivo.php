<?php
namespace TrabajoSube;

class SaldoInsuficienteException extends \Exception {}

class Colectivo{
    public $tarifa;
    public function __construct($tarifa = 120) {
        $this->tarifa = $tarifa;
    }
    public function pagarCon($Tarjeta): Boleto{
        $saldo = $Tarjeta->verSaldo();
        if (($saldo - $this->tarifa) >= -211.84){
            $status_operacion = $Boleto->mensaje();
            $Tarjeta->pagarTarifa($this->tarifa);
            return new Boleto(($saldo - $this->tarifa), $status_operacion);
        }
        else{
            throw new SaldoInsuficienteException("Saldo insuficiente");
        }
    }

}
