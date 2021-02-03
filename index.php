<?php

use App\User;
use Dotenv\Dotenv;

require_once 'vendor/autoload.php';

$env = Dotenv::createImmutable(__DIR__);

$env->load();

$user = new User;

var_dump($user->sayWelcome());
