<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new BddWorkshop\Application();

$app->get('/login', function(Request $request) use($app) {
    $error = $app['security.last_error']($request);

    return $app['twig']->render('login.twig', ['error' => $error]);
});
$app->get('/admin/produkty', function() use($app) {
    return $app['twig']->render('admin/productList.twig');
}); 

$app->run(); 
