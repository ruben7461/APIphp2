<?php
class Deporte {
   
     public $nombreDeporte;
    public $fotoDeporte;
   
 
    function __construct($nombreDeporte,$fotoDeporte) {
        $this->nombreDeporte = $nombreDeporte;
        $this->fotoDeporte = $fotoDeporte;
       
    }
 
}