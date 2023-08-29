<?php
namespace TrabajoSube;
class Colectivo{
    public $tarifa;
    public function __construct($tarifa = 120) {
        $this->tarifa = $tarifa;
    }
    public function pagarCon($Tarjeta): Boleto{
        $Tarjeta->updateSaldo($tarifa);
        if ($saldo >= $tarifa || ($saldo - $tarifa) >= 211.84){
            Boleto = new Boleto(($saldo - $tarifa), "Operacion exitosa");
            return Boleto;
        }
        else{
            echo "Saldo insuficiente";
        }
    }

}
