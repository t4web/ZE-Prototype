<?php

use Prototype\Action;

return [
    [
        'name' => 't4web-prototype',
        'path' => '/proto',
        'middleware' => Action\ViewAction::class,
        'allowed_methods' => ['GET'],
    ],
];
