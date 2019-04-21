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
        //
        DB::table('users')->insert([
            'name' => 'Enthronement Assembly',
            'email' => 'admin@enthronementassembly.org',
            'password' => bcrypt('p@55w0rd19!'),
            'church_id' => 1
        ]);
    }
}
