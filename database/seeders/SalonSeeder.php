<?php

namespace Database\Seeders;

use App\Models\Salon;
use Illuminate\Database\Seeder;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Gorogly'],
            ['name' => 'Gorogly'],
            ['name' => 'Gorogly'],
        ];

        foreach ($objs as $obj) {
            $salon = new Salon();
            $salon->name = $obj['name'];
            $salon->save();
        }
    }
}
