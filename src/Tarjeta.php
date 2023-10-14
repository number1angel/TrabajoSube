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
        $this->excedente = 0;
    }
    public function getSaldo(){
        return $this->saldo;
    }
    public function getExcedente(){
        return $this->excedente;
    }
    public function updateSaldo($carga){
            $this->saldo += $carga;
    }
    public function sumaExcedente() {
        if ($this->excedente + $this->saldo <= 6600) {
            $this->saldo += $this->excedente;
            $this->excedente = 0;
        }
        else {
            $this->excedente -= (6600 - $this->saldo);
            $this->saldo = 6600;
        }
    } 
    public function cargarSaldo($carga): Bool{
        if (in_array($carga, $this->cargasPermitidas)){
            if ($carga + $this->saldo <= 6600){
                $this->updateSaldo($carga);
                return true;
            }
            else{
                $this->saldo = 6600;
                $this->excedente += ($carga + $this->saldo) - 6600;
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




            
