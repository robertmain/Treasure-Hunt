<?php

use App\Core\Migration;

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
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
                'default' => 0,
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
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
                'default' => 0,
              ],
          ]);
          $this->dbforge->add_field($this->date_stamps);
          $this->dbforge->create_table($this->table, true);

          $this->db->insert($this->table, [
            'phone' => '01536478832',
            'password' => 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86',
          ]);
          $this->db->insert($this->table, [
            'forename' => 'Foo',
            'surname' => 'Bar',
            'email' => 'foo.bar@gmail.com',
            'password' => '24057942a277ba9f4be7ee806ecb9c63b1845677d501031367fb67ec273366e9d6edd7e37f1ed30d690fe8ce92a63e944d81658ca49ca70d1f76a386b9e41c13',
            'admin' => '1',
          ]);
      }

      /**
       * {@inheritdoc}
       */
      public function down() : void
      {
          $this->dbforge->drop_table($this->table);
      }
  }
