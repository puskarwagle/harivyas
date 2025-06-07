<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class RouteExplorer extends Component
{
    public $routes = [];

    public function mount()
    {
        $this->routes = $this->getNestedRoutes();
    }

    public function getNestedRoutes()
    {
        // Step 1: Get all routes and filter only Livewire ones with names
        $flatRoutes = collect(Route::getRoutes())
            ->filter(function ($r) {
                return $r->getName() && str_starts_with($r->getActionName(), 'App\\Livewire');
            })
            ->map(function ($r) {
                return [
                    'name' => $r->getName(),
                    'uri' => $r->uri(),
                    'segments' => explode('.', $r->getName()),
                ];
            });

        // Debug: Log or Dump flat route data
        Log::info('Flat Routes:', $flatRoutes->toArray());
        // dd($flatRoutes); // You can use this instead if you want page to die and print

        // Step 2: Convert flat list to nested tree
        $tree = [];

        foreach ($flatRoutes as $route) {
            $current = &$tree;
            foreach ($route['segments'] as $segment) {
                $current = &$current['children'][$segment];
            }
            $current['route'] = $route;
        }

        // Debug: Log raw nested tree before formatting
        Log::info('Raw Tree:', $tree);
        // dd($tree);

        return $this->formatTree($tree['children'] ?? []);
    }

    private function formatTree($branch)
    {
        // Debug: Show what branch is being formatted
        Log::info('Formatting Branch:', $branch);

        return collect($branch)->map(function ($node, $key) {
            return [
                'label' => $key,
                'route' => $node['route'] ?? null,
                'children' => isset($node['children']) ? $this->formatTree($node['children']) : [],
            ];
        })->values()->toArray();
    }


    public function render()
    {
        return view('livewire.route-explorer')            
        ->layout('welcome');
    }
}
