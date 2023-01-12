<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('superadmin123');

        $superadmin = new User;
        $superadmin->id = 1;
        $superadmin->firstname = 'Fred';
        $superadmin->lastname = 'Garcia';
        $superadmin->username = 'tinyprojectsuperadmin';
        $superadmin->email = 'victoryroar0013@gmail.com';
        $superadmin->password = $password;
        $superadmin->email_verified_at = now();

        $superadmin->save();

        $superadmin->assignRole('super admin');
    }
}
