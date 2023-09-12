<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testGetlinea(){
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta(); //necesito la tarjeta ahre
        $boleto = new Boleto(); //y el boleto tambien jiji
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $this->assertTrue($colectivo->pagarCon($tarjeta));
        $this->assertTrue($colectivo->pagarCon($tarjeta));
        $this->assertTrue($colectivo->pagarCon($tarjeta));
        $this->expectOutputString('Saldo insuficiente');
        $this->assertTrue($colectivo->pagarCon($tarjeta));
}