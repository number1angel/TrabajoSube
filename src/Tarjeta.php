<?php
namespace TrabajoSube;

class Tarjeta{
    private $saldo;
    private array $cargasPermitidas = array(150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
    private $excedente;
    private $saldoNegativo;
    private $viajesRealizados;
    private $tiempo;
    private $mesActual;

    public function __construct(TiempoInterface $tiempo) {
        $this->saldo = 0;
        $this->excedente = 0;
        $this->saldoNegativo = 0;
        $this->viajesRealizados = 0;
        $this->tiempo = $tiempo;
        $this->mesActual = $tiempo->time();
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function getExcedente(){
        return $this->excedente;
    }

    public function getNegativo(){
        return $this->saldoNegativo;
    }

    public function getViajesRealizados(){
        return $this->viajesRealizados;
    }

    public function viajesFicticios($cantidad){
        $this->viajesRealizados = $cantidad;
    }

    public function updateSaldo($carga){
        if ($this->saldo < 0){
            $this->saldo += $carga;
            $this->saldoNegativo = 1;
        }
        else{
            $this->saldo += $carga;
            $this->saldoNegativo = 0;
        }
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
                $this->excedente += ($carga + $this->saldo) - 6600;
                $this->saldo = 6600;
                return true;
            }
        }
        else{
            return false;
        }
    }

    public function pagarTarifa($tarifa){
        $this->viajesRealizados++;
        
        $mesActualNuevo = $this->tiempo->time();
        if (($mesActualNuevo - $this->mesActual)>=(30 * 24 * 60 * 60)) {
            $this->viajesRealizados = 0;
            $this->mesActual = $mesActualNuevo;
        }
        if ($this->viajesRealizados >= 30 && $this->viajesRealizados < 80) {
            $tarifa *= 0.8;
        } elseif ($this->viajesRealizados >= 80) {
            $tarifa *= 0.75;
        }
        $this->updateSaldo(-$tarifa);
    }
}





            
