<?php
namespace TrabajoSube;

class TiempoFalso implements TiempoInterface {
    protected $tiempo;
    protected $dia;
    protected $segundos;
    //protected $diaSemana;
    //protected $mes;
    
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
        return date('d', $this->tiempo);
    }

    /*public function reloj24hs(){
        return intdiv($this->segundos, 3600);
    }

    public function weekday(){
        return $this->diaSemana;
    }

    public function month(){
        return $this->mes;
    } esto usaba en item 2 iteracion 4*/
}