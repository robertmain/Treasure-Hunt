<?php

use App\Core\Migration;

class Migration_create_config_table extends Migration
{
    private $table = 'config';

    /**
     * {@inheritdoc}
     */
    public function up() : void
    {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field([
            'key' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
            'value' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false
            ],
        ]);
        $this->dbforge->add_key('key');
        $this->dbforge->add_field($this->date_stamps);
        $this->dbforge->create_table($this->table, true);

        $this->db->insert_batch($this->table, [
          [
            'key' => 'authorisation',
            'value' => '0',
          ],
          [
            'key' => 'completetitle',
            'value' => 'Congratulations',
          ],
          [
            'key' => 'completemessage',
            'value' => '<p><span  26px; \">You have found all %NCODES QR Codes and have been entered into our prize draw. Please Visit The %TEAMNAME booth for more information.</span><br></p>',
          ],
          [
            'key' => 'cookielaw',
            'value' => '1',
          ]
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
