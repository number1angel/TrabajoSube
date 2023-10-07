<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{ 
    public function testGetlinea(){
        $tarjeta = new Tarjeta();
        
        $this->assertTrue($tarjeta->cargarSaldo(300));
        $pruebaSaldo = $tarjeta->verSaldo();
        $this->assertEquals(300, $pruebaSaldo);
        
        $this->expectExceptionMessage('Monto no permitido.');
        $tarjeta->cargarSaldo(50);

        $pruebaSaldo = $tarjeta->verSaldo();
        $this->assertEquals(300, $pruebaSaldo);

        $tarjeta->cargarSaldo(4000);
        $pruebaSaldo = $tarjeta->verSaldo();
        $this->assertEquals(4300, $pruebaSaldo);

        $tarjeta->cargarSaldo(4000);
        $pruebaSaldo = $tarjeta->verSaldo();
        $this->assertEquals(6600, $pruebaSaldo);
        $pruebaExcedente = $excedente;
        $this->assertEquals(1700, $pruebaExcedente);

        $pruebaSaldo = $tarjeta->verSaldo();
        $this->assertEquals(4300, $pruebaSaldo);
    }
}