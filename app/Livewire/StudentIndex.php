<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use App\Models\student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    use WithPagination;

    public $search;
    public $selectedColumn = ''; // Default column for search
    protected $listeners = ['updatedSearch', 'updatedSelectedColumn', 'refreshComponent'];

    public function render()
    {
        $columns = ['no_induk', 'nisn', 'nama_lengkap']; // Add other columns as needed

        $student = Student::search($this->search, $columns, $this->selectedColumn)
            ->paginate(2);
        return view('livewire.student-index', [
            'student' => $student,
            'columns' => $columns,
        ]);
    }

    public function updatedSelectedColumn()
    {
        $this->resetPage();
    }

    public function refreshComponent()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        // Reset the page when the search input is updated
        $this->resetPage();
    }
}
