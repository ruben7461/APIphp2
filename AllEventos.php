<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 7/6/18
 * Time: 19:57
 */

class AllEventos
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
    public $foto_deporte;


    function __construct($id_evento, $idusuario, $eventonombre, $eventodescripcion, $deporte, $n_jugadores, $fecha, $hora, $correo, $fotoUsuario,$fotoDeporte)
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
        $this->foto_deporte = $fotoDeporte;
    }

}