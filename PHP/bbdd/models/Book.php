<?php


class Book
{

    private $id;
    public $title;
    public $author;
    public $description;

    function __construct(
        $title,
        $author='',
        $description=''
        ){
        $this->title=$title;
        $this->author=$author;
        $this->description=$description;

    }

    static function connection(){
        try {
            $pdo=new PDO("mysql:host=localhost;dbname=books;charset=utf8","root","");
        }catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() ."<br/>";
            die();
        }
        return $pdo;
        }

    function getId(){return $this->id;}
    function getTit(){return $this->title;}
    function getAuthor(){return $this->author;}
    function getDesc(){return $this->description;}


    function SetTit($title){return $this->title=$title;}
    function SetAuthor($author){return $this->author=$author;}
    function SetDesc($description){return $this->description=$description;}

    static function getAll(){
        $books=self::connection()->query('SELECT * FROM books')->fetchAll();
        $catalogo =[];
        foreach ($books as $book){
            $newBook= new Book($book['title'],$book['author'],$book['description']);
            $newBook->id=$book['id'];
            $catalogo[]=$newBook;
        }
        return var_dump($catalogo);
    }

    static function find($id){
        $res =self::connection()->query("SELECT * FROM books WHERE id='{$id}'")->fetch();
        $newBook= new Book($res['title'],$res['author'],$res['description']);
        $newBook->id=$res['id'];
        return var_dump($newBook);

    }


    function save(){

        self::connection()->query("INSERT INTO `books`(`title`, `author`, `description`) VALUES ('{$this->title}','{$this->author}','{$this->description}')")->fetch();
        $res =self::connection()->query("SELECT id FROM books WHERE id='{$this->id}'")->fetch();
        $this->id=$res;
         return print "Elemento guardado";
    }

    function deleteDB($id){

        self::connection()->query("DELETE FROM `books` WHERE id='{$id}'")->fetch();
        return print "Elemento eliminado";
    }


}



$p=new Book(p1,p2,p3);
$p->save();
$p-getId();









?>