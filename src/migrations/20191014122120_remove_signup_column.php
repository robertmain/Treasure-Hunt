<?php

use App\Core\Migration;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Migration_remove_signup_column extends Migration
{
    private $table = 'pirates';

    /**
     * {@inheritdoc}
     */
    public function up(): void
    {
        $this->dbforge->drop_column($this->table, 'signup');
    }

    /**
     * {@inheritdoc}
     */
    public function down(): void
    {
        $this->dbforge->add_column($this->table, [
            'signup' => [
              'type' => 'INT',
              'constraint' => 11,
              'null' => true,
              'default' => null,
            ],
        ]);
    }
}
