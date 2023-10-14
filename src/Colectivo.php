<?php
namespace TrabajoSube;

class SaldoInsuficienteException extends \Exception {}

class Colectivo{
    public $tarifa;
    public function __construct($tarifa = 120) {
        $this->tarifa = $tarifa;
    }
    public function mensaje() { //ESTA MAL CORREGIR
        $saldo = $Tarjeta->verSaldo();
        if ($saldo < 0) {
            return "Operacion exitosa. Abona saldo negativo";
        }
        else {
            return "Operacion exitosa";
        }
    }   
    public function pagarCon($Tarjeta): Boleto{
        $saldo = $Tarjeta->verSaldo();
        $status_operacion = $Boleto->getStatus();
        if (($saldo - $this->tarifa) >= -211.84){
            $status_operacion = $this->mensaje();
            $Tarjeta->pagarTarifa($this->tarifa);
            $Tarjeta->sumaExcedente();
            $saldo = $Tarjeta->verSaldo();
            return new Boleto($saldo, $status_operacion);
        }
        else{
            throw new SaldoInsuficienteException("Saldo insuficiente");
        }
    }

}
