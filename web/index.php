<?php

use Silex\Provider\SecurityServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\SessionServiceProvider;

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

$app->get('/login', function(Request $request) use($app) {
    $error = $app['security.last_error']($request);

    $response = '';
    if ($error) {
        $response = '<div class="error">Podałeś zły login lub hasło</div>';
    }
    $response .= <<<LOGIN
<form method="POST" action="/admin/login_check">
    <input placeholder="Login" type="text" name="_username"  />
    <input placeholder="Hasło" type="password" name="_password"  />
    <input type="submit" value="Zaloguj" />
</form>
LOGIN;

    return $response;
});
$app->get('/admin/produkty', function() use($app) {
    return 'Lista produktów';
}); 

$app->run(); 
