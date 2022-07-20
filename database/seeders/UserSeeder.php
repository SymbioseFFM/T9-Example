<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Preview User',
                'email' => 'preview@symbiose.info',
                'password' => Hash::make('preview#123', ['rounds' => 12]),
            ]
        ]);
    }
}
