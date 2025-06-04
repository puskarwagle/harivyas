<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComponentTemplate;

class ComponentTemplatesTableSeeder extends Seeder
{
    public function run()
    {
        $templates = [
            [
                'type' => 'button',
                'name' => 'Primary CTA Button',
                'html' => '<button class="btn btn-primary">Click Me</button>',
                'default_data' => json_encode(['text' => 'Click Me']),
            ],
            [
                'type' => 'card',
                'name' => 'Simple Info Card',
                'html' => '<div class="card bg-base-100 shadow-md p-4"><h2 class="card-title">Title</h2><p>Some info here.</p></div>',
                'default_data' => json_encode(['title' => 'Title', 'content' => 'Some info here.']),
            ],
            [
                'type' => 'alert',
                'name' => 'Warning Alert',
                'html' => '<div class="alert alert-warning">Warning message!</div>',
                'default_data' => json_encode(['message' => 'Warning message!']),
            ],
            [
                'type' => 'badge',
                'name' => 'Status Badge',
                'html' => '<span class="badge badge-success">Active</span>',
                'default_data' => json_encode(['text' => 'Active']),
            ],
            [
                'type' => 'navbar',
                'name' => 'Basic Navbar',
                'html' => '<div class="navbar bg-base-200"><a class="btn btn-ghost normal-case text-xl">Harivyas Nikunja</a></div>',
                'default_data' => null,
            ],
        ];

        foreach ($templates as $template) {
            ComponentTemplate::updateOrCreate(['name' => $template['name']], $template);
        }
    }
}
