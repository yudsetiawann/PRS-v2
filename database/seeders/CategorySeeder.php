<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Original
            ['name' => 'Web Design', 'slug' => 'web-design', 'color' => 'bg-red-100'],
            ['name' => 'Web Programming', 'slug' => 'web-programming', 'color' => 'bg-green-100'],
            ['name' => 'Artificial Intelligence', 'slug' => 'ai', 'color' => 'bg-blue-100'],

            // Ditambahkan
            ['name' => 'Mobile Development', 'slug' => 'mobile-development', 'color' => 'bg-yellow-100'],
            ['name' => 'Data Science', 'slug' => 'data-science', 'color' => 'bg-indigo-100'],
            ['name' => 'Machine Learning', 'slug' => 'machine-learning', 'color' => 'bg-purple-100'],
            ['name' => 'DevOps', 'slug' => 'devops', 'color' => 'bg-pink-100'],
            ['name' => 'Cybersecurity', 'slug' => 'cybersecurity', 'color' => 'bg-orange-100'],
            ['name' => 'Blockchain', 'slug' => 'blockchain', 'color' => 'bg-teal-100'],
            ['name' => 'Game Development', 'slug' => 'game-development', 'color' => 'bg-cyan-100'],
            ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'color' => 'bg-sky-100'],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'color' => 'bg-lime-100'],
            ['name' => 'SEO', 'slug' => 'seo', 'color' => 'bg-emerald-100'],
            ['name' => 'Content Strategy', 'slug' => 'content-strategy', 'color' => 'bg-fuchsia-100'],
            ['name' => 'E-commerce', 'slug' => 'e-commerce', 'color' => 'bg-rose-100'],
            ['name' => 'Entrepreneurship', 'slug' => 'entrepreneurship', 'color' => 'bg-amber-100'],
            ['name' => 'Finance', 'slug' => 'finance', 'color' => 'bg-red-100'],
            ['name' => 'Investing', 'slug' => 'investing', 'color' => 'bg-green-100'],
            ['name' => 'Productivity', 'slug' => 'productivity', 'color' => 'bg-blue-100'],
            ['name' => 'Health & Wellness', 'slug' => 'health-wellness', 'color' => 'bg-yellow-100'],
            ['name' => 'Fitness', 'slug' => 'fitness', 'color' => 'bg-indigo-100'],
            ['name' => 'Nutrition', 'slug' => 'nutrition', 'color' => 'bg-purple-100'],
            ['name' => 'Mental Health', 'slug' => 'mental-health', 'color' => 'bg-pink-100'],
            ['name' => 'Travel', 'slug' => 'travel', 'color' => 'bg-orange-100'],
            ['name' => 'Food & Cooking', 'slug' => 'food-cooking', 'color' => 'bg-teal-100'],
            ['name' => 'Photography', 'slug' => 'photography', 'color' => 'bg-cyan-100'],
            ['name' => 'Videography', 'slug' => 'videography', 'color' => 'bg-sky-100'],
            ['name' => 'Music', 'slug' => 'music', 'color' => 'bg-lime-100'],
            ['name' => 'Art & Design', 'slug' => 'art-design', 'color' => 'bg-emerald-100'],
            ['name' => 'Literature', 'slug' => 'literature', 'color' => 'bg-fuchsia-100'],
            ['name' => 'Science', 'slug' => 'science', 'color' => 'bg-rose-100'],
            ['name' => 'Technology', 'slug' => 'technology', 'color' => 'bg-amber-100'],
            ['name' => 'Education', 'slug' => 'education', 'color' => 'bg-red-100'],
            ['name' => 'History', 'slug' => 'history', 'color' => 'bg-green-100'],

            // Original 'Other' di akhir
            ['name' => 'Other', 'slug' => 'other', 'color' => 'bg-gray-100'], // Mengganti 'violet' menjadi 'gray' agar lebih netral
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
