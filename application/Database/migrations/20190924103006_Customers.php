<?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        class Migration_Customers extends CI_Migration {

            public function up() {
                $this->dbforge->add_field(array(
                    'id' => [
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ],
                    'name' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ],
                    'document' => [
                        'type' => 'VARCHAR',
                        'constraint' => '14',
                    ],
                    'registry' => [
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                    ],
                    'address' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ],
                    'address_number' => [
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                    ],
                    'address_city' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                    ],
                    'address_state' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                    ],
                    'income' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                    ],
                    'created_by' => [
                        'type' => 'INT',
                    ],
                    'created_at' => [
                        'type' => 'DATETIME',
                        'default' => date('Y-m-d H:i:s'),
                        'string' => false
                    ],
                    'status' => [
                        'type' => 'BOOLEAN',
                        'default' => false,
                    ]
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('customers');
            }

            public function down() {
                $this->dbforge->drop_table('customers');
            }

        }
