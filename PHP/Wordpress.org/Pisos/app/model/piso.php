<?php
namespace CasoP\Pisos\Model;
use PDO;
use CasoP\Bootstrap\Database as Db;
class Piso
{
    private $id;
    private $direccion;
    private $precio;
    private $descripcion;
    private $ciudad;

    public function __construct($direccion="", $precio="", $descripcion="",$ciudad="",$id=null)
    {
        $this->id = $id;
        $this->direccion = $direccion;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->ciudad=$ciudad;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM pisos');
        foreach($req->fetchAll() as $piso) {
        $list[] = new Piso($piso['direccion'], $piso['precio'], $piso['descripcion'],$piso['ciudad'],$piso['id']);
        }
        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM pisos WHERE id = :id');
        $req->execute(array('id' => $id));
        $piso = $req->fetch();
        return new Piso($piso['direccion'],$piso['precio'], $piso['descripcion'],$piso['ciudad'],$piso['id']);
    }

    public function del()
    {
        $list = [];
        $db = Db::getInstance();
        $id = $this->getId();
        $req = $db->query("DELETE FROM pisos WHERE id = $id");
        $req1 = $db->query('SELECT * FROM pisos');
        foreach($req1->fetchAll() as $piso) {
        $list[] = new Piso($piso['direccion'], $piso['precio'], $piso['descripcion'],$piso['ciudad'],$piso['id']);
        };
        return   $list;
    }

    public function save()
    {
        $db = Db::getInstance();
        $dir=$this->getDireccion();
        $pre=$this->getPrecio();
        $desc=$this->getDescripcion();
        $city=$this->getCiudad();
        $req = $db->query("INSERT INTO pisos(direccion, precio, descripcion,ciudad) VALUES ('$dir','$pre','$desc','$city')");
    }

    public function upda($direccion, $precio, $descripcion,$ciudad,$id)
    {
    $db = Db::getInstance();
    $req = $db->query("UPDATE pisos SET direccion='$direccion', precio='$precio', descripcion='$descripcion', ciudad='$ciudad' WHERE id='$id'");
    }


}