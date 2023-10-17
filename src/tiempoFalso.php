<?php
namespace TrabajoSube;

class TiempoFalso implements TiempoInterface {
    protected $tiempo;
    
    public function __construct($iniciarEn = 0) {
        $this->tiempo = $iniciarEn;
    }
    
    public function avanzar($segundos) {
        $this->tiempo += $segundos;
    }
    
    public function time() {
        return $this->tiempo;
    }

    public function day() {
        return date('d');
    }
}