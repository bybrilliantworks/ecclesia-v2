<?php

use Illuminate\Database\Seeder;

class ChurchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('churches')->insert([
            'name' => 'Enthronement House Christian Center',
            'description' => 'Enthronment Assembly, Activating and Actualizing God"s Royalty in you',
            'address' => 'Plot A2 Hakeem Balogun Way, Agidingbi, Alausa Ikeja',
            'website' => 'http://enthronementassembly.org'
        ]);
    }
}
