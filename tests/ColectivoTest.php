<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testColectivo(){
        $tarjeta = new Tarjeta();
        $medioBoleto = new medioBoleto();
        $boletoGratuito = new boletoGratuito();
        $tiempoFalso = new tiempoFalso();
        $colectivo = new Colectivo($tiempoFalso);
        
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

        $this->assertTrue($medioBoleto->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($medioBoleto);
        $boleto = $colectivo->pagarCon($medioBoleto);
        $tiempoFalso->avanzar(350);
        //sleep(300); (anda bien)
        $boleto = $colectivo->pagarCon($medioBoleto);
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(-210, $pruebaSaldo);

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
