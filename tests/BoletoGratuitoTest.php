<?php 
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoGratuitoTest extends TestCase{ 
    public function testGetlinea(){
        $boletoGratuito = new boletoGratuito();
        $this->assertTrue($boletoGratuito->cargarSaldo(300));
        $pruebaSaldo = $boletoGratuito->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);    
    }
}