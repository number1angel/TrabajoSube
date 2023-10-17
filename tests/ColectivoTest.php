<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testPasajeNormal(){
        $tarjeta = new Tarjeta();
        $colectivo = new Colectivo("127");
        
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
        $tiempoFalso = new TiempoFalso(0);
        $medioBoleto = new medioBoleto($tiempoFalso);
        $colectivo = new Colectivo("127");
     
        $this->assertTrue($medioBoleto->cargarSaldo(150));
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);//1
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);//2
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);//3
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);//4
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(-90, $pruebaSaldo); //bien 4 medios boletos
        $tiempoFalso->avanzar(300);
        $boleto = $colectivo->pagarCon($medioBoleto);//5
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(-210, $pruebaSaldo); //hasta aca pruebo que no podes utilizar mas de 4 medios por dia.
        
        $tiempoFalso->avanzar(86900);//pasa un dia
        $this->assertTrue($medioBoleto->cargarSaldo(250)); //quedo en 40 positivo
        $boleto = $colectivo->pagarCon($medioBoleto);
        $pruebaSaldo = $medioBoleto->getSaldo();
        $this->assertEquals(-20, $pruebaSaldo);//puedo volver a usar el medio boleto.
    }
    public function testPasajeGratuito(){
        $tiempoFalso = new TiempoFalso(0);
        $colectivo = new Colectivo("126");
        $tiempoPersonalizado = new TiempoFalso();
        $tiempoPersonalizado->setDay('Mon'); 
        $boletoGratuito = new boletoGratuito($tiempoPersonalizado);
        
        $this->assertTrue($boletoGratuito->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $tiempoFalso->avanzar(86900);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $pruebaSaldo = $boletoGratuito->getSaldo();
        $this->assertEquals(30, $pruebaSaldo); //deberia ser 150. problema deL ITEM 2 ITERACION 4.
    }
    public function testInterurbano(){
        $tarjeta = new Tarjeta();
        $colectivo = new ColectivoInterurbano("M");
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(-34, $pruebaSaldo);
        $this->assertInstanceOf(Boleto::class, $boleto);
    }    
}