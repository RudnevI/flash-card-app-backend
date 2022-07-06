<?php

use App\Models\Card;
use App\Models\Collection;
use App\Models\Level;
use App\Models\Option;
use App\Models\Profile;
use App\Models\Status;

$routes = [
    'collection',
    'card',
    'question',
    'statuses',
    'levels',
    'options',
    'profiles'
];

$models = [
    Collection::class,
    Card::class,
    Question::class,
    Status::class,
    Level::class,
    Option::class,
    Profile::class
];

$map = [];

for ($i = 0; $i < count($routes); $i++) {
    $map += [$routes[$i] => $models[$i]];
}
return $map;
