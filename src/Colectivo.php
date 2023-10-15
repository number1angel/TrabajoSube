<?php
namespace TrabajoSube;

//class SaldoInsuficienteException extends \Exception {}

class Colectivo{
    public $tarifa;
    private $status_operacion;
    public function __construct($tarifa = 120) {
        $this->tarifa = $tarifa;
    }
    public function mensaje($Tarjeta) { //ESTA MAL CORREGIR
        $negativo = $Tarjeta->getNegativo();
        if ($negativo == 1) {
            $status_operacion = "Operacion exitosa. Abono saldo negativo en ultima carga";
        }
        else {
            $status_operacion = "Operacion exitosa";
        }
    }   
    public function pagarCon($Tarjeta){
        $saldo = $Tarjeta->getSaldo();
        if (($saldo - $this->tarifa) >= -211.84){
            $this->mensaje($Tarjeta);
            $Tarjeta->pagarTarifa($this->tarifa);
            $Tarjeta->sumaExcedente();
            $saldo = $Tarjeta->getSaldo();
            return new Boleto($saldo, $status_operacion);
        }
        else{
            //throw new SaldoInsuficienteException("Saldo insuficiente");
            return false;
        }
    }
    public function getStatus(){
        return $this->status_operacion;
    }  
}
