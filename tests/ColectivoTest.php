<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testGetlinea(){
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta();
        $medioBoleto = new medioBoleto();
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->expectExceptionMessage('Saldo insuficiente');
        $colectivo->pagarCon($tarjeta);
        $this->assertInstanceOf(Boleto::class, $boleto);

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
        $pruebaSaldo = $boletoGratuito->verSaldo();
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $colectivo->pagarCon($boletoGratuito);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertEquals(150, $pruebaSaldo);
    }
}    
