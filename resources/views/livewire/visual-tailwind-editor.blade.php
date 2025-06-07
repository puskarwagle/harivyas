<div x-data="{ classes: '', selectedComponent: '', components: ['button', 'card', 'badge'] }" class="p-6 shadow-md">
    <!-- Title -->
    <h1 class="text-2xl font-bold mb-4 text-primary text-center">Visual Tailwind Editor</h1>

    <!-- Pages and Navigation and Routing Area -->
    <div class="border border-accent-300 rounded-lg p-4 mb-4">
        <div class="flex flex-horizontal items-center justify-between mb-4">
            <h2 class="font-semibold">Pages and Navigation</h2>
            <button class="btn btn-primary">Add Page</button>
        </div>
        <h2 class="font-semibold mb-2">Pages and Nav</h2>
        <button wire:click="mount" class="btn btn-sm btn-primary mb-2">🔄 Refresh Routes</button>        <div :class="classes" class="transition-all duration-300 border border-accent-300 p-4 rounded-lg min-h-[50px]">
            @livewire('route-explorer')
        </div>
    </div>

    <!-- Preview Area -->
    <div class="border border-accent-300 rounded-lg p-4 mb-4">
        <h2 class="font-semibold mb-2">Page Viewer</h2>
        <div :class="classes" class="transition-all duration-300 border border-accent-300 p-4 rounded-lg min-h-[50px]">
            Menu Tree 
        </div>
    </div>

    <!-- Preview Area -->
    <div class="border border-accent-300 rounded-lg p-4 mb-4">
        <h2 class="font-semibold mb-2">Component Preview</h2>
        <div :class="classes" class="transition-all duration-300 border border-accent-300 p-4 rounded-lg min-h-[50px]">
            Component Live preview here
        </div>
    </div>

    <!-- Component Chooser -->
    <div class="border border-accent-300 rounded-lg p-4 mb-4">
        <h2 class="font-semibold mb-2">🧱 Components</h2>
        <div class="flex gap-2 flex-wrap">
            <template>
                <button class="px-3 py-1 bg-secondary text-primary rounded hover:bg-secondary-focus">
                    <span></span>
                </button>
            </template>
        </div>
    </div>

    <!-- Code Editor -->
    <div class="border border-accent-300 rounded-lg p-4 mb-4">
        <h2 class="font-semibold mb-2">🔤 Code</h2>
        <textarea x-model="classes" class="w-full h-32 border border-accent-300 rounded-lg p-2" placeholder="Type Tailwind classes here...">
        </textarea>
    </div>

</div>


