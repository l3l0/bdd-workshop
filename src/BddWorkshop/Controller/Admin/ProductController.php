<?php

namespace BddWorkshop\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class ProductController
{
    public function listAction(Request $request, Application $app)
    {
        $products = [];
        try {
            $products = $app['db']->fetchAll('SELECT * FROM products');
        } catch (\Exception $e) {
        }

        return $app['twig']->render('admin/productList.twig', ['products' => $products]);
    }
}