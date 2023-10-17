<?php
namespace TrabajoSube;

interface TiempoInterface{
public function time();
public function day();
//public function weekday();
//public function reloj24hs();
//public function month();
}

class Tiempo implements TiempoInterface{
    public function time() {
        return time();
    }
    public function day() {
        return date('d');
    }
    /*public function weekday(){
        return date('D');
    }
    public function reloj24hs(){
        return intval(date('G'));
    }
    public function month(){
        return date('M');
    }8*/
}