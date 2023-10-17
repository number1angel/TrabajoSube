<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoGratuitoTest extends TestCase{ 
    public function tests(){
        $tiempoFalso = new TiempoFalso(0);
        $boletoGratuito = new boletoGratuito($tiempoFalso);
        
        $this->assertTrue($boletoGratuito->cargarSaldo(300));
        $pruebaSaldo = $boletoGratuito->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);    
    }
}