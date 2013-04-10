<?php

namespace BddWorkshop;

use Silex\Application as BaseApplication;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class Application extends BaseApplication
{
    public function __construct($values = [])
    {
        if (!isset($values['env'])) {
            $values['env'] = 'dev';
        }

        parent::__construct($values);

        $this->register(new SessionServiceProvider);
        $this->register(new TwigServiceProvider, [
            'twig.path' => __DIR__.'/../../views'
        ]);
        $this->register(
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
        $this->register(
            new DoctrineServiceProvider, 
            [
                'db.options' => [
                    'driver' => 'pdo_sqlite',
                    'path' => sprintf('%s/app_%s.db', __DIR__.'/../../databases/', $values['env'])
                ]
            ]
        );
    }

    public function registerRoutes()
    {
        $this->get('/login', 'BddWorkshop\Controller\SecurityController::loginAction');
        $this->get('/admin/produkty', 'BddWorkshop\Controller\Admin\ProductController::listAction');
    }
}
