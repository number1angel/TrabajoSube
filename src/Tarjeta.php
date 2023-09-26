<?php
namespace TrabajoSube;

class SaldoExcedeLimiteException extends \Exception {}
class MontoNoPermitidoException extends \Exception {}

class Tarjeta{
    private $saldo;
    
    private array $cargasPermitidas = array (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 13000, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
    public function __construct($saldo = 0) {
        $this->saldo = $saldo;
    }
    
    public function verSaldo(){
        return $this->saldo;
    }
    public function updateSaldo($carga){
        $this->saldo += $carga;
    }
    public function cargarSaldo(){
        if (in_array($carga, $this->cargasPermitidas)) {
            if ($carga + $this->saldo <= 6600){
                $this->updateSaldo($carga);
            }
            else{
                throw new SaldoExcedeLimiteException("Saldo supera limite de 6600.");
            }
        }
        else{
            throw new MontoNoPermitidoException("Monto no permitido.");
        }
    public function pagarTarifa($tarifa){
    $this->updateSaldo(-$tarifa);
    }
    }

class franquicia_parcial extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(-$tarifa/2);
    }
}

class franquicia_completa extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(0);
    }
}




            
