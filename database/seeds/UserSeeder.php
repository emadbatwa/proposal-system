<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'name' => 'أحمد محمد عبدالله',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'سعد عبدالله سعيد',
            'email' => 'employee@example.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);

        factory(App\User::class, 18)->create();

    }
}
