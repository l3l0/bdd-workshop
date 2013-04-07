<?php

namespace Context;

use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Exception\PendingException;

class OwnerContext extends RawMinkContext
{
    /**
     * @Given /^że jestem zalogowany jako właściciel strony$/
     */
    public function zeJestemZalogowanyJakoWlascicielStrony()
    {
        $this->getSession()->getPage()->fillField('Login', 'admin');
        $this->getSession()->getPage()->fillField('Hasło', 'foo');
    }

    /**
     * @Given /^że jestem na stronie zarządzania produktami$/
     */
    public function zeJestemNaStronieProduktow()
    {
        $this->getSession()->visit($this->locatePath('/admin/produkty'));
    }

    /**
     * @Given /^nie jestem zalogowany$/
     */
    public function nieJestemZalogowany()
    {
        $this->assertSession()->pageTextNotContains('Zalogowany jako "admin"');
    }

    /**
     * @Given /^wypełniam pole "([^"]*)" wartością "([^"]*)"$/
     */
    public function wypelniamPoleWartoscia($label, $value)
    {
        $this->getSession()->getPage()->fillField($label, $value);
        
    }

    /**
     * @Given /^klikam przycisk "([^"]*)"$/
     */
    public function klikamPrzycisk($label)
    {
        $this->getSession()->getPage()->pressButton($label);
        
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
