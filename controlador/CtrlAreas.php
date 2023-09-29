<?php
require_once './core/Controlador.php';
require_once './modelo/Areas.php';

class CtrlAreas extends Controlador {
    public function index(){
        # echo "Hola Cargo";
        $obj = new Areas;
        $data = $obj->getTodo();

        # var_dump($data);exit;//

        $datos = [
            'titulo'=>'Areas',
            'datos'=>$data['data']
        ];

        $this->mostrar('areas/mostrar.php',$datos);
    }

    public function eliminar(){
        $idareas = $_GET['idareas'];
        # echo "eliminando: ".$id;
        $obj =new Areas ($idareas);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        $this->mostrar('areas/formulario.php');
    }
    public function editar(){
        $idareas = $_GET['idareas'];
        # echo "Editando: ".$id;
        $obj = new Areas($idareas);
        $data = $obj->editar();
        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data'][0]
        ];
        $this->mostrar('areas/formulario.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        $idareas = $_POST['id'];
        $nombre = $_POST['nombre'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Areas ($idareas, $nombre);

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