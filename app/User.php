<?php

namespace App;

class User
{
    protected $name;

    protected $age;

    protected $profession;

    public function __construct($name, $age, $profession)
    {
        $this->name = $name;
        $this->age = $age;
        $this->profession = $profession;
    }
}
