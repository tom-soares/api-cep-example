<?php

use App\Place;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        factory(App\Place::class, 100)->create();

        (new Place([
            'number' => '447',
            'name' => 'GT',
            'cep' => '17500060',
        ]))->save();
    }
}
