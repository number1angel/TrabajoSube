<?php
namespace TrabajoSube;

interface TiempoInterface{
public function time();
}

class Tiempo implements TiempoInterface{
    public function time() {
        return time();
    }
}