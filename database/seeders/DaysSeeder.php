<?php

namespace Database\Seeders;

use App\Models\Days;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Monday'],
            ['name' => 'Tuesday'],
            ['name' => 'Wednesday'],
            ['name' => 'Thursday'],
            ['name' => 'Friday'],
            ['name' => 'Saturday'],
        ];

        foreach ($objs as $obj) {
            $days = new Days();
            $days->name = $obj['name'];
            $days->save();
        }
    }
}
