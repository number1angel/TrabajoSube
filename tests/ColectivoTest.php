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
    }
}    
