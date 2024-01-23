<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $foto_guru;

    public function mount($userId)
    {
        // Load the user data based on the provided $userId
        $this->user = User::findOrFail($userId);
    }

    public function render()
    {
        return view('livewire.teacher-edit');
    }

    public function updatedFotoGuru()
    {
        // Handle file upload here if needed
    }
}
