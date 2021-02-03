<?php

use App\Config;

if (!function_exists('env')) {
    function env($key)
    {
        return $_ENV[$key];
    }
}

if (!function_exists('config')) {
    function config($key)
    {
        return (new Config())->get($key);
    }
}
