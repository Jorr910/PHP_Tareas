<?php 

 class Biblioteca {

    // Modificadores de acceso. 
    private $id;
    private $titulo; 
    private $autor; 
    private $categoria; 

    function __construct($idParam, $nombreParam, $autorParam, $categoriaParam) 
    {
        $this->id = $idParam;
        $this->titulo = $nombreParam; 
        $this->autor = $autorParam; 
        $this->categoria = $categoriaParam;
    }

    // Abstracción -> Métodos para interactuar con propiedades.


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  string
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */ 
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  string
     */ 
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  string
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}


?>