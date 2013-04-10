<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new BddWorkshop\Application(['env' => 'test']);
$app->registerRoutes();
$app->run(); 
