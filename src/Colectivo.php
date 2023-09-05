<?php
namespace TrabajoSube;
class Colectivo{
    public $tarifa;
    public function __construct($tarifa = 120) {
        $this->tarifa = $tarifa;
    }
    public function pagarCon($Tarjeta): Boleto{
        $saldo = $Tarjeta->verSaldo();
        if (($saldo - $tarifa) >= -211.84){
            $Tarjeta->pagarTarifa($tarifa);
            Boleto = new Boleto(($saldo - $tarifa), "Operacion exitosa");
            return Boleto;
        }
        else{
            echo "Saldo insuficiente";
        }
    }

}
