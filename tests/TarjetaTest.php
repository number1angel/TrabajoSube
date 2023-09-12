<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{ 
    public function testGetlinea(){
        $tarjeta = new Tarjeta();
        
        $this->assertTrue($tarjeta->cargarSaldo(300));
        $pruebaSaldo = $tarjeta->verSaldo();
        $this->assertEquals(300, $pruebaSaldo);
    }
}