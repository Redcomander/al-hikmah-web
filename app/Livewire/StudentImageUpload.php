<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class StudentImageUpload extends Component
{
    use WithFileUploads;

    public $gambar_santri; // Use the same name as your input
    public $uploadProgress = 0;
    public $image;

    public function render()
    {
        return view('livewire.student-image-upload');

    }

    public function updatedGambarSantri()
    {
        $this->validate([
            'gambar_santri' => 'image|max:1024', // adjust the validation rules as needed
        ]);
    }

    // Livewire hook to handle file upload progress
    public function updatedUploadProgress($value)
    {
        $this->uploadProgress = $value;
    }

    public function ShowImage($file)
    {
        $this->validate([
            'gambar_santri' => 'image|max:1024', // adjust the validation rules as needed
        ]);

        // Simulate file upload progress for demonstration purposes
        for ($i = 0; $i <= 100; $i += 10) {
            $this->emit('fileUploadProgress', $i);
            sleep(1); // Simulate processing time
        }

        // Perform the actual file upload here

        // Reset progress bar after upload
        $this->reset(['gambar_santri', 'uploadProgress']);
    }
}
