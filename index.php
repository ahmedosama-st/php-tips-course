<?php

use App\Utilties\Collection;

require_once 'vendor/autoload.php';

$collection = new Collection([[1], [2, 4], [3]]);

var_dump($collection->flatten());
