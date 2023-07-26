<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Mir1'],
            ['name' => 'Univermag'],
            ['name' => 'Gulzemin'],
        ];

        foreach ($objs as $obj) {
            $location = new Location();
            $location->name = $obj['name'];
            $location->save();
        }
    }
}
