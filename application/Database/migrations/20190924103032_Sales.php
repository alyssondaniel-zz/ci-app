<?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        class Migration_Sales extends CI_Migration {

            public function up() {
                $this->dbforge->add_field(array(
                    'id' => [
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ],
                    'product_id' => [
                        'type' => 'INT',
                    ],
                    'customer_id' => [
                        'type' => 'INT',
                    ],
                    'quantity' => [
                        'type' => 'INT',
                    ],
                    'payment_method' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                    ],
                    'sale_at' => [
                        'type' => 'DATETIME',
                        'default' => date('Y-m-d H:i:s'),
                        'string' => false
                    ],
                    'amount' => [
                        'type' => 'DECIMAL',
                        'constraint' => '9,2',
                        'null' => FALSE,
                        'default' => 0
                    ],
                    'created_by' => [
                        'type' => 'INT',
                    ],
                    'status' => [
                        'type' => 'BOOLEAN',
                        'default' => false,
                    ],
                    'created_at' => [
                        'type' => 'DATETIME',
                        'default' => date('Y-m-d H:i:s'),
                        'string' => false
                    ],
                    'updated_at' => [
                        'type' => 'DATETIME',
                        'default' => date('Y-m-d H:i:s'),
                        'string' => false
                    ],
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('sales');
            }

            public function down() {
                $this->dbforge->drop_table('sales');
            }

        }
