<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin(id: 11, firstname: 'Admin', lastname: 'A', username: 'tinyprojectadmin1', email: '101@student.vgu.edu.vn');
        $this->createAdmin(id: 12, firstname: 'Admin', lastname: 'B', username: 'tinyprojectadmin2', email: '102@student.vgu.edu.vn');
    }

    /**
     * Create a new admin
     *
     * @return App\Models\User The created admin
     */
    private function createAdmin(int|string $id, string $firstname, string $lastname, string $username, string $email, $password = 'admin123') : User
    {
        $password = Hash::make($password);

        $admin = new User;
        $admin->id = $id;
        $admin->firstname = $firstname;
        $admin->lastname = $lastname;
        $admin->username = $username;
        $admin->email = $email;
        $admin->password = $password;
        $admin->email_verified_at = now();

        $admin->save();
        $admin->assignRole(['admin', 'client']);

        return $admin;
    }
}
