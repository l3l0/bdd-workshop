<?php

namespace spec\BddWorkshop\Controller\Admin;

use PHPSpec2\ObjectBehavior;

class ProductController extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('BddWorkshop\Controller\Admin\ProductController');
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Silex\Application $application
     * @param \Twig_Extension $twig
     * @param \Doctrine\DBAL\Connection $connection
     */
    function its_list_action_renders_product_lists_from_database($request, $response, $application, $twig, $connection)
    {
        $application->offsetGet('twig')->willReturn($twig);
        $application->offsetGet('db')->willReturn($connection);
        $products = [
            ['id' => 1, 'nazwa' => 'DTX450', 'opis' => 'jakis opis', 'cena' => 2399],
            ['id' => 2, 'nazwa' => 'DTX450k', 'opis' => 'jakis opis', 'cena' => 239.9]
        ];

        $connection->fetchAll('SELECT * FROM products')->willReturn($products);

        $twig->render('admin/productList.twig', ['products' => $products])->shouldBeCalled()->willReturn($response);

        $this->listAction($request, $application)->shouldBe($response);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Silex\Application $application
     * @param \Twig_Extension $twig
     */
    function its_new_action_renders_new_product_template($request, $response, $application, $twig)
    {
        $request->isMethod('post')->willReturn(false);
        $twig->render('admin/productNew.twig')->shouldBeCalled()->willReturn($response);

        $this->newAction($request, $application)->shouldBe($response);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     * @param \Silex\Application $application
     * @param \Doctrine\DBAL\Connection $connection
     * @param \Symfony\Component\HttpFoundation\ParameterBag $postParams
     */
    function its_new_action_save_product_and_redirect_to_list_when_request_is_post_and_name_is_not_empty($request, $response, $application, $connection, $postParams)
    {
        $request->isMethod('post')->willReturn(true);
        $request->request = $postParams;
        $postParams->get('name')->willReturn('Jakas nazwa');
        $postParams->get('opis')->willReturn('Opis');
        $postParams->get('cena')->willReturn('123.12');

        $connection->insert('product', ['name' => 'Jakas nazwa', 'opis' => 'Opis', 'cena' => '123.12'])->shouldBeCalled();
        $application->redirect('/admin/produkty')->shouldBeCalled();

        $this->newAction($request, $application);
    }
}
