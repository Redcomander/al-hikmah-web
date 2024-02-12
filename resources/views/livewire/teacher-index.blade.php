@if ($teachers->count() > 0)
    <div class="list-group">
        @foreach ($teachers as $col)
            <div class="list-group-item mb-3 shadow rounded-3">
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <div class="rounded-image me-md-3 mb-3 mb-md-0 text-center">
                        @if ($col->foto_guru)
                            <img src="{{ asset('storage/' . $col->foto_guru) }}" alt="Foto Guru" class="img-fluid">
                        @else
                            No Image
                        @endif
                    </div>
                    <div class="d-md-none"><!-- Hide on medium screens and above -->
                        <livewire:online-status :userId="$col->id" :key="$col->id" />
                    </div>

                    <div class="flex-grow-1">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $col->id }}">
                                    <button data-mdb-collapse-init
                                        class="accordion-button collapsed d-flex justify-content-between gap-3 align-items-center"
                                        type="button" data-mdb-toggle="collapse"
                                        data-mdb-target="#flush-collapse{{ $col->id }}" aria-expanded="false"
                                        aria-controls="flush-collapse{{ $col->id }}">
                                        <span>{{ $col->name }}</span>
                                        <div class="d-none d-md-flex align-items-center">
                                            <livewire:online-status :userId="$col->id" :key="$col->id" />
                                            {{-- <span class="accordion-arrow"></span> --}}
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $col->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading{{ $col->id }}"
                                    data-mdb-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-bold">Wali Kelas</td>
                                                        <td>
                                                            {{ $col->wali_kelas }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Status</td>
                                                        <td>
                                                            {{ $col->status }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Grades</td>
                                                        <td>
                                                            {{ $col->grades }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    @if (auth()->user()->hasGrade('Website Admin', 'Developer'))
                        <div class="mt-3 mt-md-0 d-flex justify-content-center">
                            <a href="{{ url('teacher/' . $col->id . '/edit') }}" class="btn btn-success me-2">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ url('teacher/' . $col->id) }}" method="post"
                                id="deleteForm{{ $col->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger"
                                    onclick="confirmDelete('{{ $col->id }}')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        {{ $teachers->links('livewire.pagination') }}
    @else
        <p>No results found.</p>
@endif
</div>
