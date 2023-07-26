<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => '1 Year', 'price' => 9000],
            ['name' => '3 Months', 'price' => 2250],
            ['name' => '1 Month', 'price' => 750],

        ];

        foreach ($objs as $obj) {
            $membership = new Membership();
            $membership->name = $obj['name'];
            $membership->price = $obj['price'];
            $membership->save();
        }
    }
}
