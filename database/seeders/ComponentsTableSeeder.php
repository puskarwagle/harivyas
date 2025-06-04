<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Component;
use App\Models\Page;
use App\Models\ComponentTemplate;

class ComponentsTableSeeder extends Seeder
{
    public function run()
    {
        $homePage = Page::where('slug', 'home')->first();
        $buttonTemplate = ComponentTemplate::where('name', 'Primary CTA Button')->first();
        $cardTemplate = ComponentTemplate::where('name', 'Simple Info Card')->first();

        if (!$homePage || !$buttonTemplate || !$cardTemplate) {
            $this->command->error('Required default pages or templates missing.');
            return;
        }

        $components = [
            [
                'page_id' => $homePage->id,
                'component_template_id' => $buttonTemplate->id,
                'name' => 'Hero CTA Button',
                'html' => '<button class="btn btn-primary">Get Started</button>',
                'data' => json_encode(['text' => 'Get Started']),
                'order' => 1,
                'is_default' => true,
            ],
            [
                'page_id' => $homePage->id,
                'component_template_id' => $cardTemplate->id,
                'name' => 'Welcome Info Card',
                'html' => '<div class="card bg-base-100 shadow-md p-4"><h2 class="card-title">Welcome</h2><p>Welcome to Harivyas Nikunja website.</p></div>',
                'data' => json_encode(['title' => 'Welcome', 'content' => 'Welcome to Harivyas Nikunja website.']),
                'order' => 2,
                'is_default' => true,
            ],
        ];

        foreach ($components as $component) {
            Component::updateOrCreate(
                ['name' => $component['name'], 'page_id' => $component['page_id']],
                $component
            );
        }
    }
}
