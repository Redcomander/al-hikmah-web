<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryIndex extends Component
{
    public $galleries;

    public function mount()
    {
        // Retrieve gallery items from the database
        $this->galleries = Gallery::all();
    }

    public function render()
    {
        return view('livewire.gallery-index');
    }
}
