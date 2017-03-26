<?php
namespace Talentum\Bookstore\Controller;

use Talentum\Bookstore\View\View;
use Talentum\Bookstore\Model\Book;


class BookController
{
 public function index()
 {
    $view = new View('app/templates/book');
    $books = Book::all();
    $view->render('index.php', ["books"=>$books]);
 }
 public function show($id)
 {
 $view = new View('app/templates/book');
 $book = Book::find($id);
 $view->render('show.php', ['book' => $book]);
 }
}
?>