<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    public function __construct($saldo = 0) {
        $this->saldo = $saldo;
    }
    public function verSaldo(){
        return $this->saldo;
        }
    public function cargarSaldo(){
        
        
    }
