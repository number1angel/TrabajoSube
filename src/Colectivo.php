<?php
namespace TrabajoSube;

class SaldoInsuficienteException extends \Exception {}

class Colectivo{
    public $tarifa;
    public function __construct($tarifa = 120) {
        $this->tarifa = $tarifa;
    }
    public function mensaje() { //ESTA MAL CORREGIR
        $saldo = $Tarjeta->getSaldo();
        if ($saldo < 0) {
            return "Operacion exitosa. Abona saldo negativo";
        }
        else {
            return "Operacion exitosa";
        }
    }   
    public function pagarCon($Tarjeta, $Boleto): Boleto{
        $saldo = $Tarjeta->getSaldo();
        $status_operacion = $Boleto->getStatus();
        if (($saldo - $this->tarifa) >= -211.84){
            $status_operacion = $this->mensaje();
            $Tarjeta->pagarTarifa($this->tarifa);
            $Tarjeta->sumaExcedente();
            $saldo = $Tarjeta->getSaldo();
            return new Boleto($saldo, $status_operacion);
        }
        else{
            throw new SaldoInsuficienteException("Saldo insuficiente");
        }
    }

}
