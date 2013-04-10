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
        $this->getSession()->getPage()->fillField('Login', 'Admin');
        $this->getSession()->getPage()->fillField('Hasło', 'Foo');
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

        foreach ($table->getHash() as $row) {
            $app['db']->delete('products', ['nazwa' => $row['nazwa']]);
        }

        foreach ($table->getHash() as $row) {
            $app['db']->insert('products', $row);
        }
    }

    /**
     * @Given /^kliklam w link "([^"]*)"$/
     */
    public function kliklamWLink($link)
    {
        $this->getSession()->getPage()->clickLink($link);
    }

    /**
     * @Given /^powinna pojawić się lista z produktem "([^"]*)" na czele$/
     */
    public function powinnaPojawicSieListaZProduktemNaCzele($nazwaProduktu)
    {
        $elements = $this->getSession()->getPage()->findAll('css', 'table.items tbody tr');
        if (!isset($elements[0])) {
            throw new ElementNotFoundException($this->getSession(), sprintf('table.items tbody tr[%d]', 0));
        }
        $element = $elements[0]->find('css', 'td.name');
        if (!$element) {
            throw new ElementNotFoundException($this->getSession(), sprintf('table.items tbody tr[%d] td.%s', 0, $class));
        }

        $regex   = '/'.preg_quote($email, '/').'/ui';

        if (!preg_match($regex, $element->getText())) {
            $message = sprintf('The text "%s" was not found in the text of the element matching %s "%s".', $email, 'css', sprintf('table.items tbody tr[%d] td.%s', 0, $class));
            throw new ElementTextException($message, $this->getSession(), $element);
        }
    }

    /**
     * @Given /^produkt "([^"]*)" powinnen być widoczny$/
     */
    public function produktPowinnenBycWidoczny($name)
    {
        $this->assertSession()->pageTextContains($name);
    }
}
