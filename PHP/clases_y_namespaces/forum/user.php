<?php

namespace Forum;

class User
{
    public $name;
    public $surname;
    public $age;
    public $gender;

    public function __construct(
        $name, $surname, $age=null, $gender=null
    ){
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->gender = $gender;
    }
}
