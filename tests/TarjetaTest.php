<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{ 
    public function testMontoInvalido(){
        $tarjeta = new Tarjeta();
        $tiempoFalso = new TiempoFalso(0);
        $colectivo = new Colectivo();
        
        $this->assertTrue($tarjeta->cargarSaldo(300));
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);
        
        $this->assertFalse($tarjeta->cargarSaldo(50));
    }

    public function testExcedente(){
        $tarjeta = new Tarjeta();
        $tiempoFalso = new TiempoFalso(0);
        $colectivo = new Colectivo();

        $tarjeta->cargarSaldo(4000);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(4000, $pruebaSaldo);

        $tarjeta->cargarSaldo(4000);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(6600, $pruebaSaldo);
        $pruebaExcedente = $tarjeta->getExcedente();
        $this->assertEquals(1400, $pruebaExcedente);

        $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(6600, $pruebaSaldo);
        $pruebaExcedente = $tarjeta->getExcedente();
        $this->assertEquals(1280, $pruebaExcedente);
    }
}