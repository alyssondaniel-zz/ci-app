<?php
class UsersSeeder extends Seeder {

    private $table = 'users';

    public function run() {
        $this->db->truncate($this->table);
        $this->load->library('encryption');

        //seed records manually
        $data = [
            'name' => 'admin',
            'matriculation' => '9871',
            'password' => $this->encryption->encrypt('123123'),
            'status' => true
        ];
        $this->db->insert($this->table, $data);
        echo "First user created";
        //seed many records using faker
        // $limit = 50;
        // echo "seeding $limit user accounts";
        //
        // for ($i = 0; $i < $limit; $i++) {
        //     echo ".";
        //
        //     $data = array(
        //         'name' => $this->faker->unique()->userName,
        //         'matriculation' => '1234',
        //         'password' => $this->encryption->encrypt('123123')
        //     );
        //
        //     $this->db->insert($this->table, $data);
        // }

        echo PHP_EOL;
    }
}
