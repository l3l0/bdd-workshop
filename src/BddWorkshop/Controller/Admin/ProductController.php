<?php

namespace BddWorkshop\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class ProductController
{
    public function listAction(Request $request, Application $app)
    {
        $products = $app['db']->fetchAll('SELECT * FROM products p ORDER BY p.id DESC');

        return $app['twig']->render('admin/productList.twig', ['products' => $products]);
    }

    public function newAction(Request $request, Application $app)
    {
        if ($request->isMethod('post')) {
            $app['db']->insert('products', [
                'nazwa' => $request->request->get('name'),
                'opis' => $request->request->get('desc'),
                'cena' => $request->request->get('price')
            ]);
            return $app->redirect('/admin/produkty');
        }
        return $app['twig']->render('admin/productNew.twig');
    }
}
