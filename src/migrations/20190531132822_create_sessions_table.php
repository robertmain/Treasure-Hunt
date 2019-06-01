<?php

use App\Core\Migration;

class Migration_create_sessions_table extends Migration
{
    private $table = 'ci_sessions';

    /**
     * {@inheritdoc}
     */
    public function up(): void
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field([
            'id' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'null'       => false,
            ],
            'timestamp' => [
                'type'    => 'BIGINT',
                'default' => '0',
                'null'    => false,
            ],
            'data' => [
                'type'    => 'text',
                'default' => '',
                'null'    => false,
            ],
        ]);
        $this->dbforge->add_key('timestamp');
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
