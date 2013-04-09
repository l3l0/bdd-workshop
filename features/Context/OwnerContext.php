<?php

namespace Context;

use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;

class OwnerContext extends RawMinkContext
{
    /**
     * @Given /^że jestem zalogowany jako właściciel strony$/
     */
    public function zeJestemZalogowanyJakoWlascicielStrony()
    {
        $this->getSession()->visit($this->locatePath('/admin/produkty'));
        $this->getSession()->getPage()->fillField('Login', 'admin');
        $this->getSession()->getPage()->fillField('Hasło', 'foo');
        $this->getSession()->getPage()->pressButton('Zaloguj');
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
        $this->assertSession()->pageTextContains('Lista produktów');
    }

    /**
     * @Given /^nie powinna pojawić się lista produktów które moge edytować$/
     */
    public function niePowinnaPojawicSieListaProduktowKtoreMogeEdytowac()
    {
        $this->assertSession()->pageTextNotContains('Lista produktów');
    }

    /**
     * @Given /^powinen pojawić się błąd "([^"]*)"$/
     */
    public function powinenPojawicSieBlad($error)
    {
        $this->assertSession()->elementTextContains('css', '.error', $error);
    }

    /**
     * @Given /^istnieją następujące produkty:$/
     */
    public function istniejaNastepujaceProdukty(TableNode $table)
    {
        $app = new \BddWorkshop\Application(['env' => 'test']);

        $app['db']->delete('products', []);
        $app['db']->insert('products', $table->getHash());
    }

    /**
     * @Given /^kliklam w link "([^"]*)"$/
     */
    public function kliklamWLink($link)
    {
        throw new PendingException();
    }

    /**
     * @Given /^powinna pojawić się lista z produktem "([^"]*)" na czele$/
     */
    public function powinnaPojawicSieListaZProduktemNaCzele($nazwaProduktu)
    {
        throw new PendingException();
    }
}
