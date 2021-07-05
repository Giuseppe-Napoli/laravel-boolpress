<?php

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'HTML',
            'CSS',
            'JAVASCRIPT',
            'PHP'
        ];

        foreach ($data as $item) {
            $new_category = new Category();
            $new_category->name = $item;
            $new_category->slug = Str::slug($item,'-');
            $new_category->save();
        }
    }
}
