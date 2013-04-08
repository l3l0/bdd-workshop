<?php

use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new SessionServiceProvider);
$app->register(
    new SecurityServiceProvider,
    [
        'security.firewalls' => [
            'admin' => [
                'pattern' => '^/admin/',
                'logout' => ['logout_path' => '/admin/logout'],
                'form' => ['login_path' => '/login', 'check_path' => '/admin/login_check'],
                'users' =>[
                    'Admin' => ['ROLE_ADMIN', 'QtHIJZSatQY53Uvsf7Vg/QD96IRZWGweEIzjietoM2pttqCC3zcoct14ZSzumiNqplauV9REppaKUjz5QYXOdA==']
                ]
            ]
        ]             
    ]
);
$app->register(new TwigServiceProvider, [
    'twig.path' => __DIR__.'/../views'
]);

$app->get('/login', function(Request $request) use($app) {
    $error = $app['security.last_error']($request);

    return $app['twig']->render('login.twig', ['error' => $error]);
});
$app->get('/admin/produkty', function() use($app) {
    return $app['twig']->render('admin/productList.twig');
}); 

$app->run(); 
