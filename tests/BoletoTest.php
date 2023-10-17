<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
   
    public function testBoleto(){
        $tiempo = new Tiempo();
        $colectivo = new Colectivo("Q");
        $tiempoFalso = new TiempoFalso(0);
        $tarjeta = new Tarjeta($tiempoFalso);
        $tarjeta->cargarSaldo(300);
        $this->assertInstanceOf(Boleto::class, $colectivo->pagarCon($tarjeta));
    }
}