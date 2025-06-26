<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Create New Gallery Post</h1>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" x-data="{ tagsInput: '' }" @keydown.enter.prevent="$refs.addTag.click()">
        <div class="form-control mb-4">
            <label class="label"><span class="label-text">Title *</span></label>
            <input type="text" wire:model.defer="title" class="input input-bordered" required />
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="form-control mb-4">
            <label class="label"><span class="label-text">Description</span></label>
            <textarea wire:model.defer="description" class="textarea textarea-bordered" rows="4"></textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="form-control mb-4" x-data="{
            tags: @entangle('tags'),
            newTag: '',
            addTag() {
                if (this.newTag.trim() && !this.tags.includes(this.newTag.trim())) {
                    this.tags.push(this.newTag.trim());
                    this.newTag = '';
                }
            },
            removeTag(index) {
                this.tags.splice(index, 1);
            }
        }">
            <label class="label"><span class="label-text">Tags</span></label>
            <div class="flex flex-wrap gap-2 mb-2">
                <template x-for="(tag, index) in tags" :key="index">
                    <div class="badge badge-info cursor-pointer" @click="removeTag(index)" x-text="tag"></div>
                </template>
            </div>
            <div class="flex">
                <input type="text" placeholder="Add tag" x-model="newTag" class="input input-bordered flex-grow" @keydown.enter.prevent="addTag()" />
                <button type="button" @click="addTag()" x-ref="addTag" class="btn btn-primary ml-2">Add</button>
            </div>
            @error('tags') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="form-control mb-4">
            <label class="cursor-pointer label">
                <input type="checkbox" wire:model.defer="show_in_homepage" class="checkbox" />
                <span class="label-text ml-2">Show in Homepage</span>
            </label>
        </div>

        <div class="form-control mb-4">
            <label class="label"><span class="label-text">Location</span></label>
            <input type="text" wire:model.defer="location" class="input input-bordered" />
            @error('location') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="form-control mb-6">
            <label class="label"><span class="label-text">Year</span></label>
            <input type="text" wire:model.defer="year" class="input input-bordered" maxlength="10" />
            @error('year') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-full">Create Post</button>
    </form>
</div>
