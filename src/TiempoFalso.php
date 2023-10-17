<?php
namespace TrabajoSube;

class TiempoFalso implements TiempoInterface {
    protected $tiempo;
    protected $dia;
    protected $segundos;
    protected $diaSemana;
    protected $semana = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    protected $mes;
    
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

    public function reloj24hs(){
        return intdiv($this->segundos, 3600);
    }

    public function weekday(){
        return $this->diaSemana;
    }

    public function month(){
        return $this->mes;
    }

    public function setDay($day) {
        if (in_array($day, $this->semana)) {
            $this->diaSemana = $day;
        } else {
            return false;
        }
    }
}