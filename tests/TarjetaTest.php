<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{ 
    public function tests(){
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo();
        
        $this->assertTrue($tarjeta->cargarSaldo(300));
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);
        
   
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(300, $pruebaSaldo);

        $tarjeta->cargarSaldo(4000);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(4300, $pruebaSaldo);

        $tarjeta->cargarSaldo(4000);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(6600, $pruebaSaldo);
        $pruebaExcedente = $excedente;
        $this->assertEquals(1700, $pruebaExcedente);

        $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(6600, $pruebaSaldo);
        $pruebaExcedente = $excedente;
        $this->assertEquals(1580, $pruebaExcedente);
    }
}