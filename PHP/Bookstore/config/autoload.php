<?php

function Autoloader($className) {
 $className = str_replace("\\", "/", $className);
 $fileName = $className . '.php';
 $fileName = str_replace('Talentum/Bootstrap', 'Bootstrap',$fileName);
 $fileName = str_replace('Talentum/Bookstore', 'app',$fileName);
 require_once($fileName);
}
spl_autoload_register('Autoloader');

?>