<div x-data="{ classes: '', selectedComponent: '', components: ['button', 'card', 'badge'] }" class="p-6 shadow-md">
    <!-- Title -->
    <h1 class="text-2xl font-bold mb-4 text-primary text-center">Visual Tailwind Editor</h1>

    <!-- Preview Area -->
    <div class="border border-accent-300 rounded-lg p-4 mb-4">
        <h2 class="font-semibold mb-2">Pages and Nav</h2>
        <div :class="classes" class="transition-all duration-300 border border-accent-300 p-4 rounded-lg min-h-[50px]">
            Menu Tree 
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
            <template x-for="component in components" :key="component">
                <button @click="insertComponent(component)" class="px-3 py-1 bg-secondary text-primary rounded hover:bg-secondary-focus">
                    <span x-text="component.charAt(0).toUpperCase() + component.slice(1)"></span>
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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('editor', () => ({
            classes: ''
            , selectedComponent: ''
            , components: ['button', 'card', 'badge']
            , insertComponent(name) {
                const templates = {
                    button: 'px-4 py-2 bg-blue-500 text-primary rounded'
                    , card: 'p-4 shadow rounded bg-gray-100'
                    , badge: 'inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full'
                };
                this.classes = templates[name] || '';
            }
        }));
    });

</script>
