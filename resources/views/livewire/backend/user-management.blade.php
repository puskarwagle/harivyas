<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">User Management</h1>

    <button wire:click="create" class="btn btn-primary mb-4">+ New User</button>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="text-right space-x-2">
                            <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-info">Edit</button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-error">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $users->links() }}</div>

    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
                <h2 class="text-xl font-semibold mb-4">{{ $editMode ? 'Edit User' : 'Create User' }}</h2>

                <div class="space-y-4">
                    <input type="text" wire:model.defer="name" placeholder="Name" class="input input-bordered w-full" />
                    @error('name') <span class="text-error text-sm">{{ $message }}</span> @enderror

                    <input type="email" wire:model.defer="email" placeholder="Email" class="input input-bordered w-full" />
                    @error('email') <span class="text-error text-sm">{{ $message }}</span> @enderror

                    <input type="password" wire:model.defer="password" placeholder="{{ $editMode ? 'Leave blank to keep current password' : 'Password' }}" class="input input-bordered w-full" />
                    @error('password') <span class="text-error text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button wire:click="$set('showModal', false)" class="btn btn-ghost">Cancel</button>
                    <button wire:click="save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    @endif
</div>
