<?php

use Exceptions\Operation\InvalidOperationException;
use Exceptions\Http\Client\ForbiddenException;

/**
 * Migration CLI controller
 *
 * Used for running migrations from the CLI (for example, from a composer script)
 * @ignore
 */

//phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
//phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
        if (!$this->input->is_cli_request()) {
            throw new ForbiddenException('You do not have permission to execute migrations');
            exit(EXIT_ERROR);
        }
    }

    /**
     * Migrate the database to the latest version
    */
    public function latest() : void
    {
        $this->migration->latest();
    }

    /**
     * Drop the _ENTIRE_ database and re-create it. BE VERY CAREFUL WITH THIS.
     *
     * This method will not allow itself to be run if it detects that it is in a production environment
    */
    public function drop() : void
    {
        if (ENVIRONMENT === 'production') {
            throw new InvalidOperationException('Can\'t drop the database in production');
        } else {
            $database_name = $this->db->database;

            $this->dbforge->drop_database($database_name);
            $this->dbforge->create_database($database_name);
        }
    }
}
