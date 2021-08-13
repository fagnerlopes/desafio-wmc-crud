<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        foreach(User::all() as $u) {
            $u->delete();
        }

        DB::table('users')->insert([
            'email' => 'admin@dominio.com',                
            'name'     => 'Admin',
            'password' => Hash::make('123456')           
        ]);
    }
}
