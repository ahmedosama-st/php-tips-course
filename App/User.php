<?php

namespace App;

class User
{
    public function sayWelcome()
    {
        return [env('DB_USER'), config('db.user')];
    }
}
