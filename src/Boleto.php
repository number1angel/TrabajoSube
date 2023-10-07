<?php
namespace TrabajoSube;
class Boleto{
    public $saldo_restante;
    public $status_operacion;
    public $fecha;
    public $tipo;
    public $linea;
    public $totalAbonado;
    public $saldo;
    public $id;

    public function __construct($saldo_restante, $status_operacion) {
        $this->saldo_restante = $saldo_restante;
        $this->status_operacion = $status_operacion;
    }  

    public function mensaje() {
        if ($saldo < 0) {
            $this->status_operacion = "Operacion exitosa. Abona saldo negativo";
        }
        else {
            $this->status_operacion = "Operacion exitosa"
        }
    }  
}