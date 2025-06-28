<?php

namespace App\Livewire\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $showModal = false;
    public $editMode = false;
    public $userId;

    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('nullable|min:6')]
    public $password;

    public function render()
    {
        return view('livewire.backend.user-management', [
            'users' => User::latest()->paginate(10),
        ])->layout('components.layouts.app');
    }

    public function create()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->showModal = true;
    }

    public function edit(User $user)
    {
        $this->resetValidation();
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->editMode = true;
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->editMode && $this->userId) {
            $user = User::findOrFail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ]);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }

        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
    }

    private function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'userId']);
    }
}
