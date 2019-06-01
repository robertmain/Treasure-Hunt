<?php

use App\Core\Migration;

class Migration_create_treasure_table extends Migration
{
    private $table = 'treasure';

    /**
     * {@inheritdoc}
     */
    public function up(): void
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field([
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 23,
                'default'    => null,
            ],
            'text' => [
                'type'       => 'LONGTEXT',
                'default'    => null,
            ],
            'md5' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 23,
                'null' => true,
                'defualt' => null,
            ],
            'clue' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => null,
            ],
        ]);
        $this->dbforge->add_field($this->date_stamps);
        $this->dbforge->add_key('md5');
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
