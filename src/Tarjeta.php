<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    private array $cargasPermitidas = array (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 13000, 1400, 1500, 2000, 2500, 3000, 3500, 4000);
    public function __construct($saldo = 0) {
        $this->saldo = $saldo;
    }
    public function verSaldo(){
        return $this->saldo;
        }
    public function cargarSaldo($carga = 0){
        if (in_array($carga, $this->cargasPermitidas) {
            if($carga + $saldo <= 6600){
                $this->saldo += $carga;
            }
            else{
            echo "Saldo supera limite de 6600"
            }
        else{
        echo "Monto no permitido"
        }
        }
        
    }
