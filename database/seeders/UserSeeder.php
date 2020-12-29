<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainUser = ['id' => 1, 'is_admin' => true, 'email' => 'admin@example.com', 'name' => 'admin', 'password' => bcrypt('adminpassword')];

        User::create($mainUser);
    }
}
