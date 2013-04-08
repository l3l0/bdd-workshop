<?php

session_start();

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php'; 

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/admin/produkty', function() use($app) {
    if (isset($_SESSION['user']) && $_SESSION['user']) {
        return 'Lista produktów';
    }
    if (!isset($_SESSION['user'])) {
        return <<<LOGIN
<form method="POST" action="/admin/produkty">
    <input placeholder="Login" type="text" name="_username"  />
    <input placeholder="Hasło" type="password" name="_password"  />
    <input type="submit" value="Zaloguj" />
</form>
LOGIN;

    }
}); 
$app->post('/admin/produkty', function(Request $request) use($app) {
    if ('Admin' === $request->request->get('_username', '')  && 'Foo' === $request->request->get('_password', '')) {
        $_SESSION['user'] = true;
        return $app->redirect('/admin/produkty');
    }

    return '<div class="error">Podałeś zły login lub hasło</div>';
}); 

$app->run(); 
