<?php

namespace App\Core;

use \CI_Migration;
use App\Core\Model;

/**
 * Base Migration
 *
 * Abstract base migration to extend into concrete migrations. Useful for specifying base migration behaviour etc.
 */
abstract class Migration extends CI_Migration
{

    /**
     * @var String The field name for the created datestamp
    */
    const CREATED = Model::CREATED;

    /**
     * @var String The field name for the updated datestamp
    */
    const UPDATED = Model::UPDATED;

    /**
     * @var String The field name for the deleted datestamp
    */
    const DELETED = Model::DELETED;

    /**
     * {@inheritdoc}
    */
    public function __construct($config = [])
    {
        $this->date_stamps = [
            static::CREATED . ' DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            static::UPDATED . ' DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()',
            static::DELETED => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ];
    }

    /**
     * Actions required to perform the migration
    */
    abstract public function up();

    /**
     * Actions required to roll back the migration
    */
    abstract public function down();
}
