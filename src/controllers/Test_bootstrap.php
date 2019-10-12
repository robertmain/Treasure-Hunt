<?php

/**
 * We don't want to generate documentation for this controller, since it's just a shim to make phpunit behave properly
 * with CodeIgniter internals
 *
 * @ignore
 */

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Test_bootstrap extends CI_Controller
{
    public function index() : void
    {
    }
}
