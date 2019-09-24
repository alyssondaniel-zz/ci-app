<?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        class Migration_Products extends CI_Migration {

            public function up() {
                $this->dbforge->add_field(array(
                    'id' => [
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ],
                    'description' => [
                        'type' => 'VARCHAR',
                        'constraint' => '45',
                    ],
                    'cash_price' => [
                        'type' => 'DECIMAL',
                        'constraint' => '9,2',
                        'null' => FALSE,
                        'default' => 0
                    ],
                    'forward_price' => [
                        'type' => 'DECIMAL',
                        'constraint' => '9,2',
                        'null' => FALSE,
                        'default' => 0
                    ],
                    'barcode' => [
                        'type' => 'VARCHAR',
                        'constraint' => '255',
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
                $this->dbforge->create_table('products');
            }

            public function down() {
                $this->dbforge->drop_table('products');
            }

        }
