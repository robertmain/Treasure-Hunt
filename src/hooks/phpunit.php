<?php

/**
 * CodeIgniter system hook(s) to enable the usage of PHPUnit for unit testing
 * with CodeIgniter
 */
// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class PHPUnit_CodeIgniter_Hook
{
    /**
     * Pre system hook used to load the config and benchmark classes.
    */
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function pre_system()
    {
        $GLOBALS['CFG'] =& load_class('Config', 'core');
        $GLOBALS['BM']  =& load_class('Benchmark', 'core');
    }
}
