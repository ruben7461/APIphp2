<?php
class Usuarios {
    
      public $nombreUsuario;
      public $apellidoUsuario;
      //public $nacionalidad;
      public $fotoUsuario;
      public $id_usuario;



    function __construct($idusario,$nombreUsuario,$apellidoUsuario,$fotoUsuario) {
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
       //$this->nacionalidad = $nacionalidad;
        $this->fotoUsuario = $fotoUsuario;
        $this->id_usuario = $idusario;
       
    }


}