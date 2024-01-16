<!-- resources/views/livewire/online-status.blade.php -->

<div wire:poll.5000ms>
    @if ($isOnline)
        <div class="container">
            <div class="online-indicator">
                <span class="blink"></span>
            </div>
            <span class="badge bg-success"> Online</span>
        </div>
    @else
        <li class="badge bg-secondary">
            Offline
        </li>
    @endif
</div>
