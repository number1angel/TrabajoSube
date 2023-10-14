<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends TestCase{ 
    public function testGetlinea(){
        $medioBoleto = new medioBoleto();
        
        $this->assertTrue($medioBoleto->cargarSaldo(300));
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);
        
        
    }
}