<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $colors = [
            'Red',
            'Blue',
            'Green',
            'Yellow',
            'Black',
            'White',
            'Magenta',
            'Orange',
            'Grey',
            'Brown'   
            
        ];

        foreach ($colors as $color) {
            $c = new \App\Models\Color();
            $c->title = $color;
            $c->save();
        }


        $makes = [
            'Toyota',
            'Peugeot',
            'Suzuki',
            'Fiat',
            'Honda',
            'Ford',
            'Hyundai',
            'Renault',
            'Volskwagen',
            'Chrystler'
        ];

        foreach ($makes as $make) {
            $c = new \App\Models\Make();
            $c->title = $make;
            $c->save();
        }
    }
}
