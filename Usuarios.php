<?php
class Usuarios {
    
      public $nombreUsuario;
      public $apellidoUsuario;
      //public $nacionalidad;
      public $fotoUsuario;
      public $id_usuario;



    function __construct($idusario,$nombreUsuario,$apellidoUsuario,$fotonUsuario) {
        $this->id_usuario = $idusario;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
       //$this->nacionalidad = $nacionalidad;
        $this->fotoUsuario = $fotonUsuario;

       
    }


}