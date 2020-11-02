<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Shubh',
            'email' => 'shubh@weswitched.studio',
            'phone' => '9840345495',
            'password' => Hash::make('1seleke0')
          ]);
    }
}
