<?php
namespace TrabajoSube;

class SaldoExcedeLimiteException extends \Exception {}
class MontoNoPermitidoException extends \Exception {}

class Tarjeta{
    private $saldo;
    private array $cargasPermitidas = array (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 13000, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
    private $excedente;

    public function __construct() {
        $this->saldo = 0;
    }
    public function __construct() {
        $this->excedente = 0;
    }
    public function verSaldo(){
        return $this->saldo;
    }
    public function updateSaldo($carga){
        if (($carga + $this->saldo + $this->excedente) <= 6600){
            $this->saldo += ($carga + $excedente);
        }
        else{
            $this->saldo = 6600;
            $this->excedente += ($carga + $this->saldo) - 6600
        }
    }
    public function cargarSaldo($carga): Bool{
        if (in_array($carga, $this->cargasPermitidas)) {
            if ($carga + $this->saldo <= 6600){
                $this->saldo = 6600;
                $this->excedente += ($carga + $this->saldo) - 6600
                return true;
            }
            else{
                $this->updateSaldo($carga);
                return true;
            }
        }
        else{
            throw new MontoNoPermitidoException("Monto no permitido.");
        }
    }
    public function pagarTarifa($tarifa){
    $this->updateSaldo(-$tarifa);
    }
}




            
