<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testPasajeNormal(){
        $tarjeta = new Tarjeta();
        $tiempoFalso = new TiempoFalso(0);
        $medioBoleto = new medioBoleto($tiempoFalso);
        $boletoGratuito = new boletoGratuito();
        $colectivo = new Colectivo();
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertFalse($colectivo->pagarCon($tarjeta));
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertTrue($tarjeta->cargarSaldo(350));
        $boleto = $colectivo->pagarCon($tarjeta);
        $status_operacion = $colectivo->getStatus();
        $this->assertEquals("Operacion exitosa. Abono saldo negativo en ultima carga", $status_operacion);
    }
    public function testPasajeMedio(){
        $tarjeta = new Tarjeta();
        $tiempoFalso = new TiempoFalso(0);
        $medioBoleto = new medioBoleto($tiempoFalso);
        $boletoGratuito = new boletoGratuito();
        $colectivo = new Colectivo();
     
        $this->assertTrue($medioBoleto->cargarSaldo(150));
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(-90, $pruebaSaldo);
    }
    public function testPasajeGratuito(){
        $tarjeta = new Tarjeta();
        $tiempoFalso = new TiempoFalso(0);
        $medioBoleto = new medioBoleto($tiempoFalso);
        $boletoGratuito = new boletoGratuito();
        $colectivo = new Colectivo();
        
        $this->assertTrue($boletoGratuito->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $colectivo->pagarCon($boletoGratuito);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $pruebaSaldo = $boletoGratuito->getSaldo();
        $this->assertEquals(150, $pruebaSaldo);
    }
}    
