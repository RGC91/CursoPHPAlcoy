<?php

require 'forum/user.php';
require 'web/user.php';

use Forum\User;
use Web\User as WebUser;

$pepa = new User('Pepa', 'Flores');
$pepe = new User('Pepe', 'Gotera');
$otilio = new User('Otilio', 'Pérez');

$admin = new WebUser('admin', 'admin@a.com');

var_dump($pepa);
echo "<br>";
var_dump($admin);
