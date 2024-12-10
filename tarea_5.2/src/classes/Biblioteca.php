<?php

namespace classes;

class Biblioteca
{
    private $id;
    private $titulo;
    private $autor;
    private $categoria;
    private $disponible;

    public function __construct($idParam, $nombreParam, $autorParam, $categoriaParam, $disponibleParam)
    {
        $this->id = $idParam;
        $this->titulo = $nombreParam;
        $this->autor = $autorParam;
        $this->categoria = $categoriaParam;
        $this->disponible = $disponibleParam;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    function isDisponible()
    {
        return $this->disponible;
    }

    function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }
}
