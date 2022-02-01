<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Seeder;

class TariffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['18%', '5%'];

        foreach ($names as $name) {
            $tariff = new Tariff;
            $tariff->name = $name;
            $tariff->value = intval(str_replace('$', '', $name));
            $tariff->save();
        }
    }
}
