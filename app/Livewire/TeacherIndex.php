<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $teachers = User::paginate(10); // You can adjust the number of items per page as needed
        return view('livewire.teacher-index', ['teachers' => $teachers]);
    }
}
