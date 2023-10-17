<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{ 
    public function testPasajeNormal(){
        $tiempoFalso = new TiempoFalso(0);
        $tarjeta = new Tarjeta($tiempoFalso);
        $colectivo = new Colectivo("127");
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertFalse($colectivo->pagarCon($tarjeta));
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
        $tiempoFalso = new TiempoFalso(); 
        $boletoGratuito = new boletoGratuito($tiempoFalso);
        
        $this->assertTrue($boletoGratuito->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $tiempoFalso->avanzar(86900);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $pruebaSaldo = $boletoGratuito->getSaldo();
        $this->assertEquals(150, $pruebaSaldo);//anda el gratuito al dia siguiente.
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $boleto = $colectivo->pagarCon($boletoGratuito);
        $pruebaSaldo = $boletoGratuito->getSaldo();
        $this->assertEquals(30, $pruebaSaldo);
    }
    public function testJubilado(){
        $tiempoFalso = new TiempoFalso(0);
        $jubilado = new boletoGratuitoJubilado($tiempoFalso);
        $colectivo = new Colectivo("116");
        
        $this->assertTrue($jubilado->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($jubilado);
        $boleto = $colectivo->pagarCon($jubilado);
        $boleto = $colectivo->pagarCon($jubilado);
        $boleto = $colectivo->pagarCon($jubilado);
        $boleto = $colectivo->pagarCon($jubilado);
        $boleto = $colectivo->pagarCon($jubilado);
        $pruebaSaldo = $jubilado->getSaldo();
        $this->assertEquals(150, $pruebaSaldo);
        $this->assertInstanceOf(Boleto::class, $boleto);
    }    
    public function testInterurbano(){
        $tiempoFalso = new TiempoFalso(0);
        $tarjeta = new Tarjeta($tiempoFalso);
        $colectivo = new ColectivoInterurbano("M");
        
        $this->assertTrue($tarjeta->cargarSaldo(150));
        $boleto = $colectivo->pagarCon($tarjeta);
        $pruebaSaldo = $tarjeta->getSaldo();
        $this->assertEquals(-34, $pruebaSaldo);
        $this->assertInstanceOf(Boleto::class, $boleto);
    }    
}