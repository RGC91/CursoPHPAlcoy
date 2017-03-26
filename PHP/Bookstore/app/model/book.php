<?php
namespace Talentum\Bookstore\Model;
use PDO;
use Talentum\Bootstrap\Database as Db;
class Book
{
 private $id;
 private $title;
 private $author;
 private $description;
 public function __construct($id=null,$title="", $author="", $description=""){
 $this->id = $id;
 $this->title = $title;
 $this->author = $author;
 $this->description = $description;
 }
 public function getId(){
 return $this->id;
 }
 public function getTitle(){
 return $this->title;
 }
 public function setTitle($title){
 $this->title = $title;
 }
 public function getAuthor(){
 return $this->author;
 }
 public function setAuthor($author){
 $this->author = $author;
 }
 public function getDescription(){
 return $this->description;
 }
 public function setDescription($description){
 $this->description = $description;
 }
public static function all() {
 $list = [];
 $db = Db::getInstance();
 $req = $db->query('SELECT * FROM catalogo');
 foreach($req->fetchAll() as $book) {
 $list[] = new Book($book['id'],$book['title'], $book['author'], $book['description']);
 }
 return $list;
 }
 public static function find($id) {
 $db = Db::getInstance();
 $id = intval($id);

 $req = $db->prepare('SELECT * FROM catalogo WHERE id = :id');
 $req->execute(array('id' => $id));
 $book = $req->fetch();
 return new Book($book['id'],$book['title'],$book['author'], $book['description']);
 }

}
