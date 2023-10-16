<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends TestCase{ 
    public function tests(){
        $tiempoFalso = new TiempoFalso(0);
        $medioBoleto = new medioBoleto($tiempoFalso);
        
        $this->assertTrue($medioBoleto->cargarSaldo(300));
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);
        
    }
}