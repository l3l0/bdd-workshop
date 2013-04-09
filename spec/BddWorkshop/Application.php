<?php

namespace spec\BddWorkshop;

use PHPSpec2\ObjectBehavior;
use PHPSpec2\Matcher\InlineMatcher;
use PHPSpec2\Matcher\CustomMatchersProviderInterface;

class Application extends ObjectBehavior implements CustomMatchersProviderInterface
{
    function it_is_silex_application()
    {
        $this->shouldHaveType('Silex\Application');
    }

    function it_allows_set_configuration_parameters_during_construction()
    {
        $this->beConstructedWith(['debug' => true, 'someOtherParameter' => 'myParam']);

        $this['debug']->shouldBe(true);
        $this['someOtherParameter']->shouldBe('myParam');
    }

    function it_registers_twig_views_path()
    {
        $this['twig.path']->shouldBeStringLike('/../views');
    }

    function it_registers_admin_security_firewall()
    {
        $this['security.firewalls']->shouldHaveCount(1);
    }

    function it_registers_sql_database_handler_for_test_database()
    {
        $this->beConstructedWith(['env' => 'test']);

        $this['db.options']['driver']->shouldBe('pdo_sqlite');
        $this['db.options']['path']->shouldBeStringLike('app_test.db');
    }

    function it_registers_sql_database_handler()
    {
        $this['db.options']['driver']->shouldBe('pdo_sqlite');
        $this['db.options']['path']->shouldBeStringLike('app_dev.db');
    }

    static public function getMatchers()
    {
        return [
            new InlineMatcher('beStringLike', function($subject, $value) {
                return false !== strpos($subject, $value);
            })
        ];
    }
}
