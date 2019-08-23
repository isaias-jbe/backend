<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Administrador do Sistema',
            'email' => 'administrador@sistema.com.br',
            'birthday' => '27/04/1995',
            'phone' => ' 85988887777',
            'password' => bcrypt('Imts@2019'),
        ]);
    }
}
