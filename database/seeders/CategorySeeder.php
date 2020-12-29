<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Sport', 'enabled' => true],
            ['id' => 2, 'name' => 'News', 'enabled' => true],
            ['id' => 3, 'name' => 'History', 'enabled' => true]
        ];

        foreach($categories as $category)
        {
            Category::create($category);
        }
    }
}
