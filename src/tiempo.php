<?php
namespace TrabajoSube;

class Tiempo implements TiempoInterface {

public function time() {
    return time();
}

}