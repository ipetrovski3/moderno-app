<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['shits', 'bags', 'bandanas', 'hoodies'];
        foreach ($names as $name) {
            $category = new Category;
            $category->name = $name;
            $category->save();
        }
    }
}
