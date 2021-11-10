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
        $names = ['shirts', 'bags', 'bandanas', 'hoodies'];
        foreach ($names as $name) {
            $category = new Category;
            $category->name = $name;
            $category->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
            $category->save();
        }
    }
}
