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
}
