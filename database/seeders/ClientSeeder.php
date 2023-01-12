<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createClient(id: 1000001, firstname: 'Client', lastname: 'A', username: 'tinyprojectclient1', email: '1000001@student.vgu.edu.vn');
        $this->createClient(id: 1000002, firstname: 'Client', lastname: 'B', username: 'tinyprojectclient2', email: '1000002@student.vgu.edu.vn');
        $this->createClient(id: 1000003, firstname: 'Client', lastname: 'C', username: 'tinyprojectclient3', email: '1000003@student.vgu.edu.vn');

        $this->createClient(id: 15812, firstname: 'Thịnh', lastname: 'Trương Phúc', username: 'truongphucthinh', email: '15812@student.vgu.edu.vn');
        $this->createClient(id: 15910, firstname: 'Đăng', lastname: 'Trần Phương Hải', username: 'tranphuonghaidang', email: '15910@student.vgu.edu.vn');
        $this->createClient(id: 16035, firstname: 'Minh', lastname: 'Võ Khánh', username: 'vokhanhminh', email: '16035@student.vgu.edu.vn');
    }

    /**
     * Create a new client
     *
     * @return App\Models\User The created client
     */
    private function createClient(int|string $id, string $firstname, string $lastname, string $username, string $email, $password = '88888888') : User
    {
        $password = Hash::make($password);

        $client = new User;
        $client->id = $id;
        $client->firstname = $firstname;
        $client->lastname = $lastname;
        $client->username = $username;
        $client->email = $email;
        $client->password = $password;
        $client->email_verified_at = now();

        $client->save();
        $client->assignRole('client');

        return $client;
    }
}
