<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class OnlineStatus extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        $user = User::find($this->userId);

        return view('livewire.online-status', [
            'isOnline' => $user->isOnline(),
        ]);
    }

    protected $listeners = ['updatedUserStatus' => '$refresh'];
}
