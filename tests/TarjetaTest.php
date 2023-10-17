<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{ 
    public function testMontoInvalido(){
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo(128);
        
        $this->assertTrue($tarjeta->cargarSaldo(300));
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);
        
        $this->assertFalse($tarjeta->cargarSaldo(50));
    }

    public function testExcedente(){
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo(127);

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
    public function testDescuentos(){
        $tarjeta = new Tarjeta();
        $tiempoFalso = new TiempoFalso(0);
        $colectivo = new Colectivo(127);
        $ficticios1 = 30;
        $ficticios2 = 80;

        $tarjeta->cargarSaldo(500);
        $tarjeta->viajesFicticios($ficticios1);
        $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(404, $pruebaSaldo);//20%descuento

        $tarjeta->viajesFicticios($ficticios2);
        $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(314, $pruebaSaldo);//25%descuento

        $tiempoFalso->avanzar(30 * 24 * 60 * 60);
        $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(224, $pruebaSaldo);
    }
}