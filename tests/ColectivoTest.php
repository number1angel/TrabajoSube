<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testColectivo(){
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta();
        $medioBoleto = new medioBoleto();
        $boletoGratuito = new boletoGratuito();
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->expectExceptionMessage('Saldo insuficiente');
        $colectivo->pagarCon($tarjeta);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertTrue($tarjeta->cargarSaldo(350));
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals("Operacion exitosa. Abona saldo negativo.", $status_operacion);

        $this->assertTrue($medioBoleto->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->expectExceptionMessage('Saldo insuficiente');
        $colectivo->pagarCon($medioBoleto);
        $this->assertInstanceOf(Boleto::class, $boleto);

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
