<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 27/5/18
 * Time: 13:53
 */

class UsuarioCorto
{

    public $id_usuario;
    public $nombreUsuario;
    public $apellidos;

    function __construct($id_usuario,$nombreUsuario,$apellidos) {
        $this->id_usuario = $id_usuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidos = $apellidos;

    }
}