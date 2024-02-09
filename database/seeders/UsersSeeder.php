<?php

namespace Database\Seeders;

use app\model\users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Username' => 'ihsanali',
            'Email' => 'ihsanali@gmail.com',
            'Password' => Hash::make('admin'),
            'Phone_Number' => '03456338378',
            'Picture_id' => '123',
            'Role_id' => '1',
            'Status' => 'Active',

        ]);
    }
}
