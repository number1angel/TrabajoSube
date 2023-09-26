class franquicia_parcial extends Tarjeta{
    public function pagarTarifa($tarifa){
    $this->updateSaldo(-$tarifa/2);
    }
}