<!-- resources/views/livewire/student-image-upload.blade.php -->

<div>
    <div class="mb-3">
        <label for="foto_guru" class="form-label">Foto</label>
        <input wire:model="foto_guru" type="file" class="form-control" id="foto_guru" name="foto_guru">
    </div>

    @if($foto_guru)
    <div class="text-center">
        <img src="{{ $foto_guru->temporaryUrl() }}" class="img-fluid mb-3" style="border-radius: 8px" height="300" width="300" alt="Image Preview">
    </div>
    @else
        <p>No image selected</p>
    @endif

    @if($uploadProgress > 0)
        <div class="progress mb-3">
            <div class="progress-bar" role="progressbar" style="width: {{ $uploadProgress }}%;" aria-valuenow="{{ $uploadProgress }}" aria-valuemin="0" aria-valuemax="100">{{ $uploadProgress }}%</div>
        </div>
    @endif

    <!-- Use wire:loading to show the progress bar during file upload -->
    <div wire:loading wire:target="foto_guru">
        <div class="progress mb-3" style="height: 20px">
            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $uploadProgress }}%;" aria-valuenow="{{ $uploadProgress }}" aria-valuemin="0" aria-valuemax="100">{{ $uploadProgress }}%</div>
        </div>
    </div>
</div>
