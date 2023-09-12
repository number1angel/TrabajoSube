<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{ 
    public function testGetlinea(){
        $ticket = new Boleto(103);
        $this->assertEquals($ticket->getLinea(), 103);
    }
}