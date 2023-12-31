<?php
require_once './core/Controlador.php';
require_once './modelo/Estados.php';

class CtrlEstados extends Controlador {
    public function index(){
        # echo "Hola Estados";
        $obj = new Estados;
        $data = $obj->getTodo();

        # var_dump($data);exit;

        $datos = [
            'titulo'=>'Estados',
            'datos'=>$data['data']
        ];

        $this->mostrar('estados/mostrar.php',$datos);
    }

    public function eliminar(){
        $id = $_GET['id'];
        # echo "eliminando: ".$id;
        $obj =new Estados ($id);
        $obj->eliminar();

        $this->index();
    }
    public function nuevo(){
        # echo "Agregando..";
        $this->mostrar('estados/formulario.php');
    }
    public function editar(){
        $id = $_GET['id'];
        # echo "Editando: ".$id;
        $obj = new Estados($id);
        $data = $obj->editar();
        # var_dump($data);exit;
        $datos = [
            'datos'=>$data['data'][0]
        ];
        $this->mostrar('estados/formulario.php',$datos);
    }
    public function guardar(){
        # echo "Guardando..";
        # var_dump($_POST);
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $esNuevo = $_POST['esNuevo'];

        $obj = new Estados ($id, $nombre);

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