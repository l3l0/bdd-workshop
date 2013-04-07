<?php

namespace Context;

use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;


/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
    private $parameters = [];

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }


    /**
     * @Given /^że jestem zalogowany jako właściciel strony$/
     */
    public function zeJestemZalogowanyJakoWlascicielStrony()
    {
        throw new PendingException();
    }

    /**
     * @Given /^że jestem na stronie produktów$/
     */
    public function zeJestemNaStronieProduktow()
    {
        throw new PendingException();
    }

    /**
     * @Given /^nie jestem zalogowany$/
     */
    public function nieJestemZalogowany()
    {
        throw new PendingException();
    }

    /**
     * @Given /^wypełniam pole "([^"]*)" wartością "([^"]*)"$/
     */
    public function wypelniamPoleWartoscia($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given /^wysyłam formularz$/
     */
    public function wysylamFormularz()
    {
        throw new PendingException();
    }

    /**
     * @Given /^powinna pojawić się lista produktów które moge edytować$/
     */
    public function powinnaPojawicSieListaProduktowKtoreMogeEdytowac()
    {
        throw new PendingException();
    }

    /**
     * @Given /^nie powinna pojawić się lista produktów które moge edytować$/
     */
    public function niePowinnaPojawicSieListaProduktowKtoreMogeEdytowac()
    {
        throw new PendingException();
    }

    /**
     * @Given /^powinen pojawić się błąd "([^"]*)"$/
     */
    public function powinenPojawicSieBlad($arg1)
    {
        throw new PendingException();
    }
}
