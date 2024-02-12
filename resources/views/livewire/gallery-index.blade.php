<div>
    <h2 class="text-center mb-3">Gallery Al-Hikmah</h2>

    @if (auth()->check())
        @if (auth()->user()->hasGrade('Website Admin', 'Developer'))
            <div class="d-flex justify-content-start">
                <div class="col-md-2">
                    <a href="{{ url('gallery/create') }}" class="btn btn-dark">Tambah Baru</a>
                </div>
            </div>
        @endif
    @endif

    @if ($galleries->count() > 0)
        @php
            $previousDate = null;
        @endphp

        <div class="container-fluid mt-5 mb-5">

            @foreach ($galleries->sortByDesc('created_at') as $col)
                @php
                    $currentDate = \Carbon\Carbon::parse($col->created_at)
                        ->locale('id')
                        ->translatedFormat('l, j F Y');
                @endphp

                @if ($currentDate != $previousDate)
                    @if ($previousDate !== null)
        </div> <!-- close the previous row -->
    @endif

    <div class="row mb-3">
        <div class="col">
            <h4>{{ $currentDate }}</h4>
        </div>
    </div>

    <div class="row">
        @endif

        <div class="col-md-4">
            <div class="card rounded-corners mb-3">
                <img src="{{ asset('storage/' . $col->image_path) }}" class="card-img-top w-100 rounded-corners"
                    alt="Landscape Image" />
            </div>
        </div>

        @php
            $previousDate = $currentDate;
        @endphp
        @endforeach

    </div> <!-- close the last row -->
</div>
@else
<h4 class="mb-3">No galleries available</h4>
@endif
</div>
