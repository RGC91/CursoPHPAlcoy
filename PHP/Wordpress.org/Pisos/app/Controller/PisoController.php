<?php
namespace CasoP\Pisos\Controller;

use CasoP\Pisos\View\View;
use CasoP\Pisos\Model\Piso;


class PisoController
{
    public function index()
    {
        $view = new View('app/templates/piso');
        $pisos = Piso::all();
        $view->render('index.php', ["pisos"=>$pisos]);
    }

    public function show($id)
    {
        $view = new View('app/templates/piso');
        $piso = Piso::find($id);
        $view->render('show.php', ['piso' => $piso]);
    }

    public function delete($id)
    {
    $piso = Piso::find($id);
    $view = new View('app/templates/piso');
    $pisos=$piso->del();
    $message= "El inmueble con id ".$id." ha sido eliminado";
    $view->render('delete.php', ['pisos' => $pisos,'message' => $message]);
    }

    public function create(){
        if(isset($_POST["Enviar"]))
        {
            $dir=$_POST["direccion"];
            $pre=$_POST["precio"];
            $desc=$_POST["descripcion"];
            $city=$_POST["ciudad"];
            $piso=new Piso($dir,$pre,$desc,$city);
            $piso->save();
            $view = new View('app/templates/piso');
            $view->render('show.php', ["piso"=>$piso]);
        }else{
            $view = new View('app/templates/piso');
            $view->render('create.php', []);
        }

    }

    public function update($id){
        if(isset($_POST["Enviar"])){

            $dir=$_POST["direccion"];
            $pre=$_POST["precio"];
            $desc=$_POST["descripcion"];
            $city=$_POST["ciudad"];
            $piso=new Piso($dir,$pre,$desc,$city);
            $piso->upda($dir,$pre,$desc,$city,$id);
            $view = new View('app/templates/piso');
            $message= "El inmueble con id ".$id." ha sido actualizado";
            $view->render('show.php', ["piso"=>$piso,'message'=>$message]);
        }else{
            $view = new View('app/templates/piso');
            $piso=Piso::find($id);
            $view->render('update.php', ['piso'=>$piso]);
    }

}

}
?>