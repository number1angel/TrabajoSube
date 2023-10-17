<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
   
    public function testBoleto(){
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("Q");
        $tarjeta = new Tarjeta();
        $tarjeta->cargarSaldo(300);
        $this->assertInstanceOf(Boleto::class, $colectivo->pagarCon($tarjeta));
    }
}