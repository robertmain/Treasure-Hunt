<?php

use App\Core\Migration;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Migration_create_found_table extends Migration
{
    private $table = 'found';

    /**
     * {@inheritdoc}
     */
    public function up(): void
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field([
            'treasure' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'pirate' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'time' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
        ]);
        $this->dbforge->add_field($this->date_stamps);
        $this->dbforge->create_table($this->table, true);
    }

    /**
     * {@inheritdoc}
     */
    public function down(): void
    {
        $this->dbforge->drop_table($this->table);
    }
}
