<?php
class Usuarios {
    
      public $nombreUsuario;
      public $apellidoUsuario;
      //public $nacionalidad;
      public $fotoUsuario;



    function __construct($nombreUsuario,$apellidoUsuario,$fotoUsuario) {
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
       //$this->nacionalidad = $nacionalidad;
        $this->fotoUsuario = $fotoUsuario;
       
    }


}