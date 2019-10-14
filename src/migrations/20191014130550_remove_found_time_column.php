<?php

use App\Core\Migration;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Migration_remove_found_time_column extends Migration
{
    private $table = 'found';

    /**
     * {@inheritdoc}
     */
    public function up(): void
    {
        $this->dbforge->drop_column($this->table, 'time');
    }

    /**
     * {@inheritdoc}
     */
    public function down(): void
    {
        $this->dbforge->add_column($this->table, [
            'time' => [
              'type' => 'INT',
              'constraint' => 11,
              'null' => true,
              'default' => null,
            ],
        ]);
    }
}
