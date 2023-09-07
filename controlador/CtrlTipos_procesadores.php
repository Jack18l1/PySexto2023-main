<?php
require_once './core/Controlador.php';
require_once './modelo/Tipos_procesadores.php';

class CtrlTipos_procesadores extends Controlador {
    public function index(){
        
        $obj = new Tipos_procesadores;
        $data = $obj->getTodo();
 
        # var_dump($data);exit;

        $datos = [
            'titulo'=>'Tipos de procesadores',
            'datos'=>$data['data']
        ];

        $this->mostrar('tipos_procesadores/mostrar.php',$datos);
    }

    public function eliminar(){
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new Tipos_procesadores ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        $this->mostrar('tipos_procesadores/formulario.php');
    }
    public function editar(){
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Tipos_procesadores($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data'][0]
        ];
        $this->mostrar('tipos_procesadores/formulario.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Tipos_procesadores ($id, $nombre);

        switch ($esNuevo) {
            case 0: # Editar
                $data=$obj->actualizar();
                break;
            
            default: # Nuevo
                $data=$obj->guardar();
                break;
        }

        
        # var_dump($data);exit;
        $this->index();

    }
}