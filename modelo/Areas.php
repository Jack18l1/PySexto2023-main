<?php
require_once './core/Modelo.php';

class areas extends Modelo {
    private $id;
    private $nombre;
    private $_tabla='areas';

    public function __construct($idareas=null,$nombre=null){
        $this->idareas = $idareas;
        $this->nombre=$nombre;
        parent::__construct($this->_tabla);
    }
    public function getTodo(){
        return $this->getAll();
    }
    public function eliminar(){
        return $this->deleteById($this->idareas);
    }
    public function guardar(){
        $datos = [
            'idareas'=>$this->idareas,
            'nombre'=>"'$this->nombre'",
        ];
        return $this->insert($datos);
    }
    public function editar(){
        return $this->getById($this->idareas);
    }
    public function actualizar(){
        $datos = [
            'idareas'=>$this->idareas,
            'nombre'=>"'$this->nombre'",
        ];
        $wh = "idareas=$this->idareas";
        return $this->update($wh,$datos);
    }
}