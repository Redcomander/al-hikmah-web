<!-- resources/views/livewire/teacher-edit.blade.php -->

<div class="mb-3">
    <label for="foto_guru" class="form-label">Foto Guru</label>

    <div class="text-center">
        @if ($foto_guru)
            <img src="{{ $foto_guru->temporaryUrl() }}" width="300" height="300" style="border-radius: 8px" alt="New Gambar Artikel" class="img-fluid mb-3">
        @elseif ($user->foto_guru)
            <img src="{{ asset('storage/' . $user->foto_guru) }}" width="300" height="300" style="border-radius: 8px" alt="Current Gambar Artikel" class="img-fluid mb-3">
        @endif

        <input type="file" name="foto_guru" class="form-control" wire:model="foto_guru" wire:loading.attr="disabled">
        <input type="hidden" name="current_foto_guru" value="{{ $user->foto_guru }}">
    </div>
</div>
