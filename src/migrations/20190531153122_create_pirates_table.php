<?php

use App\Core\Migration;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Migration_create_pirates_table extends Migration
{
    private $table = 'pirates';

      /**
       * {@inheritdoc}
       */
    public function up() : void
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field([
            'forename' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'default'    => null,
            ],
            'surname' => [
              'type'       => 'VARCHAR',
              'constraint' => 255,
              'null'       => true,
              'default'    => null,
            ],
            'phone' => [
              'type'       => 'VARCHAR',
              'constraint' => 11,
              'null'       => true,
              'default'    => null,
            ],
            'email' => [
              'type'       => 'VARCHAR',
              'constraint' => 255,
              'null'       => true,
              'default'    => null,
            ],
            'password' => [
              'type'       => 'VARCHAR',
              'constraint' => 255,
              'null'       => true,
              'default'    => null,
            ],
            'authorised' => [
              'type' => 'TINYINT',
              'constraint' => '1',
              'null' => false,
              'default' => 0,
            ],
            'admin' => [
              'type' => 'BOOLEAN',
              'null' => false,
              'default' => false,
            ],
            'username' => [
              'type' => 'VARCHAR',
              'constraint' => 255,
              'null' => true,
              'default' => null,
            ],
            'signup' => [
              'type' => 'INT',
              'constraint' => 11,
              'null' => true,
              'default' => null,
            ],
            'banned' => [
              'type' => 'BOOLEAN',
              'null' => false,
              'default' => false,
            ],
        ]);
        $this->dbforge->add_field($this->date_stamps);
        $this->dbforge->create_table($this->table, true);
    }

      /**
       * {@inheritdoc}
       */
    public function down() : void
    {
        $this->dbforge->drop_table($this->table);
    }
}
