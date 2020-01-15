<?php

use App\Core\Migration;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Migration_remove_admin_username extends Migration
{
    private $table = 'pirates';

    /**
     * {@inheritdoc}
     */
    public function up(): void
    {
        $this->dbforge->drop_column($this->table, 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function down(): void
    {
        $this->dbforge->add_column($this->table, [
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ]);
    }
}
