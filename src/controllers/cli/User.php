<?php

use Exceptions\Http\Client\BadRequestException;

/**
 * Migration CLI controller
 *
 * Used for running migrations from the CLI (for example, from a composer script)
 */

//phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
//phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->input->is_cli_request()) {
            throw new BadRequestException('This script may only be called from the CLI');
            exit(EXIT_ERROR);
        }
    }

    /**
     * Create a new user from the CLI.
     * Handy for bringing up a new admin user the first time the app is run
    */
    public function create($phone, $password, bool $admin = false) : void
    {
        $this->load->database();

        $this->load->model(['Pirate']);

        $this->Pirate->save([
            'phone' => $phone,
            'password' => $password,
            'admin' => $admin,
        ]);
    }
}
