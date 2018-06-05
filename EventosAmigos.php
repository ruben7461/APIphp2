<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 5/6/18
 * Time: 19:16
 */

class EventosAmigos
{

    public $id_evento;
    public $id_usuario;
    public $evento_nombre;
    public $evento_descripcion;
    public $fecha;
    public $hora;
    public $correo;
    public $fotoUsuario;
    public $deporte;
    public $n_jugadores;


    function __construct($id_evento, $idusuario, $eventonombre, $eventodescripcion, $deporte, $n_jugadores, $fecha, $hora, $correo, $fotoUsuario)
    {
        $this->id_evento = $id_evento;
        $this->id_usuario = $idusuario;
        $this->evento_nombre = $eventonombre;
        $this->evento_descripcion = $eventodescripcion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->correo = $correo;
        $this->fotoUsuario = $fotoUsuario;
        $this->deporte = $deporte;
        $this->n_jugadores = $n_jugadores;
    }
}