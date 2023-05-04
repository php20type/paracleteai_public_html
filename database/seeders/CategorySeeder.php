<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = [
            ['id' => 1, 'name' => 'Blog', 'code' => 'blog', 'type' => 'original'],
            ['id' => 2, 'name' => 'Email', 'code' => 'email', 'type' => 'original'],
            ['id' => 3, 'name' => 'Other', 'code' => 'other', 'type' => 'original'],
            ['id' => 4, 'name' => 'Social Media', 'code' => 'social', 'type' => 'original'],
            ['id' => 5, 'name' => 'Content', 'code' => 'text', 'type' => 'original'],
            ['id' => 6, 'name' => 'Video', 'code' => 'video', 'type' => 'original'],
            ['id' => 7, 'name' => 'Website', 'code' => 'web', 'type' => 'original'],
            ['id' => 8, 'name' => 'Marketing', 'code' => 'marketing', 'type' => 'original'],
            ['id' => 9, 'name' => 'Ads', 'code' => 'ad', 'type' => 'original'],
            ['id' => 10, 'name' => 'SEO', 'code' => 'seo', 'type' => 'original'],
            ['id' => 11, 'name' => 'Framework', 'code' => 'framework', 'type' => 'original'],
            ['id' => 12, 'name' => 'Ecommerce', 'code' => 'ecommerce', 'type' => 'original'],

        ];

        foreach ($ads as $ad) {
            Category::updateOrCreate(['id' => $ad['id']], $ad);
        }
    }
}
