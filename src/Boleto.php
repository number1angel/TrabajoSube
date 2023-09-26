<?php
namespace TrabajoSube;
class Boleto{
    public $saldo_restante;
    public $status_operacion;
    public function __construct($saldo_restante = 0, $status_operacion) {
        $this->saldo_restante = $saldo_restante;
        $this->status_operacion = $status_operacion;
    }  
}