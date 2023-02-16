<?php

 class User

{
    protected $nombre;
    protected $edad;
    protected $sexo;
    protected $rol;

    public function __construct($nombre, $edad, $sexo, $rol)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->rol = $rol;
    }
    
    public function getNombre() {return $this->nombre;}
    public function setNombre($nombre){$this->nombre = $nombre;}
    public function getEdad() {return $this->edad;}
    public function setEdad($edad){$this->edad= $edad;}
    public function getSexo() {return $this->sexo;}
    public function setSexo($sexo){$this->sexo= $sexo;}
    public function getRol() {return $this->rol;}
    public function setRol($rol){$this->rol= $rol;}

}