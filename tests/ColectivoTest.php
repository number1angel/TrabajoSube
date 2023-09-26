<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testGetlinea(){
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta();
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertTrue($colectivo->pagarCon($tarjeta));
        $this->assertTrue($colectivo->pagarCon($tarjeta));
        $this->expectOutputString('Saldo insuficiente');
        $this->assertTrue($colectivo->pagarCon($tarjeta));
    }
}    
