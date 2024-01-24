<div>
    <div class="container">
        <div class="row d-flex justify-content-end align-items-center">
            <div class="col-md-4">
                <input wire:model.live="search" type="search" class="form-control rounded mb-3 mb-md-0"
                    placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <select class="form-select mdb-select colorful-select dropdown-primary" wire:model="selectedColumn">
                        @foreach ($columns as $column)
                            <option class="select-option" value="{{ $column }}">{{ ucfirst(str_replace('_', ' ', $column)) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @if ($student->total() > 0)
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nomor Induk</th>
                        <th>NISN</th>
                        <th scope="col" class="col-6">Nama Lengkap</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize the counter
                    @endphp

                    @forelse ($student as $col)
                        <tr class="align-middle">
                            <td>{{ $counter++ }}</td>
                            <td>{{ $col->no_induk }}</td>
                            <td>{{ $col->nisn }}</td>
                            <td>{{ $col->nama_lengkap }}</td>
                            <td>
                                <a href="{{ url('student/' . $col->id . '/edit') }}" class="btn btn-edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ url('student/' . $col->id) }}" method="post"
                                    id="deleteForm{{ $col->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete('{{ $col->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-mdb-ripple-init data-mdb-modal-init
                                    data-mdb-target="#previewModal{{ $col->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @include('student.modal-santri')
                            </td>
                        </tr>
                        <!-- Modal -->

                    @empty
                        <td colspan="7" class="text-center">No Data Available</td>
                    @endforelse
                </tbody>
            </table>
            {{ $student->links('livewire.pagination') }}
    </div>
@else
    <p>No records found.</p>
    @endif
</div>
