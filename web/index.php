<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new BddWorkshop\Application();
$app->registerRoutes();
$app->run(); 
