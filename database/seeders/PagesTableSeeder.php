<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            [
                'name' => 'Home',
                'slug' => 'home',
                'is_default' => true,
                'is_visible' => true,
                'is_published' => true,
                'show_in_nav' => true,
                'nav_order' => 1,
                'type' => 'static',
                'meta' => json_encode(['title' => 'Welcome to Harivyas Nikunja']),
            ],
            [
                'name' => 'About',
                'slug' => 'about',
                'is_default' => true,
                'is_visible' => true,
                'is_published' => true,
                'show_in_nav' => true,
                'nav_order' => 2,
                'type' => 'static',
                'meta' => json_encode(['title' => 'About Nimbarka Sampradaya']),
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact',
                'is_default' => true,
                'is_visible' => true,
                'is_published' => true,
                'show_in_nav' => true,
                'nav_order' => 3,
                'type' => 'static',
                'meta' => json_encode(['title' => 'Contact Us']),
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
