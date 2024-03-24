<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cleaning',
                'description' => 'Services related to cleaning and housekeeping tasks.',
            ],
            [
                'name' => 'Maintenance',
                'description' => 'Services related to property maintenance and repairs.',
            ],
            [
                'name' => 'Repairs',
                'description' => 'Services for repairing household items and appliances.',
            ],
            [
                'name' => 'Landscaping',
                'description' => 'Services for landscaping, gardening, and outdoor maintenance.',
            ],
            [
                'name' => 'Painting',
                'description' => 'Services related to interior and exterior painting.',
            ],
            [
                'name' => 'Plumbing',
                'description' => 'Services for plumbing repairs and installations.',
            ],
            [
                'name' => 'Electrical',
                'description' => 'Services for electrical repairs and installations.',
            ],
        ];

        Category::insert($categories);
    }
}
