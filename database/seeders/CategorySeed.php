<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->firstOrCreate([
           'name' => 'Làm đẹp',
           'slug' => Str::slug("Làm đẹp"),
        ]);

        Category::query()->firstOrCreate([
            'name' => 'Sức khỏe',
            'slug' => Str::slug("Sức khỏe"),
        ]);

        Category::query()->firstOrCreate([
            'name' => 'Cuộc sống',
            'slug' => Str::slug("Cuộc sống"),
        ]);

        Category::query()->firstOrCreate([
            'name' => 'Tham khảo',
            'slug' => Str::slug("Tham khảo"),
        ]);
    }
}
