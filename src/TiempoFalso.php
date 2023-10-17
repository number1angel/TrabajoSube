<?php
namespace TrabajoSube;

class TiempoFalso implements TiempoInterface {
    protected $tiempo;
    protected $dia;
    protected $segundos;
    //protected $diaSemana;
    //protected $mes;
    //protected $indiceSemana;
    //protected $semana = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    //protected $indiceMes;
    //protected $listaMes = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    
    public function __construct($iniciarEn = 0) {
        $this->tiempo = $iniciarEn;
        //$this->indiceSemana = 0;
        //$this->diaSemana = $this->semana[$this->indexSemana];
        //$this->indiceMes = 0;
        //$this->mes = $this->listaMes[$this->indexMes];
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
    }esto usaba en item 2 iteracion 4

    public function month(){
        return $this->mes;
    }
    
    public function setDay($day) {
    
    if (in_array($day, $semana)) {
        $this->diaSemana = $day;
    } else {
        return false;
    }
}
    
    NO ANDA ITEM 2 ITERACION 4 TESTS */
}