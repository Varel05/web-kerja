<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <header>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">Bitizens</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    {{-- End of Navbar --}}
    </header>
    <main class="container">
        {{-- Table --}}
        <div class="container my-4">
            <div class="container p-2">
                <h3>Daftar pekerja</h3>
                <button type="button" class="btn btn-secondary my-2" id="add-worker-btn" data-bs-toggle="modal" data-bs-target="#workerModal">Tambah Data</button>
                <form class="d-inline-flex mx-3" role="search">
                    <input class="form-control me-2" type="text" name="search" placeholder="Cari data pekerja..." aria-label="Search" value="{{ $search ?? '' }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
            <div class="container-fluid border border-success border-opacity-25 shadow p-0">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col" class="col-md-1 ms-md-auto">#</th>
                            <th scope="col" class="col-md-1 ms-md-auto">Nama</th>
                            <th scope="col" class="col-md-1 ms-md-auto">Jabatan</th>
                            <th scope="col" class="col-md-1 ms-md-auto">Departemen</th>
                            <th scope="col" class="col-md-1 ms-md-auto">Gaji</th>
                            <th scope="col" class="col-md-1 ms-md-auto">Tanggal Direkrut</th>
                            <th scope="col" class="col-md-1 ms-md-auto">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($workers as $worker)
                        <tr>
                            <td>{{ $worker->id }}</td>
                            <td>{{ $worker->name }}</td>
                            <td>{{ $worker->position }}</td>
                            <td>{{ $worker->departement }}</td>
                            <td>Rp. {{ number_format($worker->salary, 2, ',', '.') }}</td>
                            <td>{{ $worker->hire_date }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm edit-worker-btn"
                                data-id="{{ $worker->id }}" 
                                data-name="{{ $worker->name }}" 
                                data-position="{{ $worker->position }}" 
                                data-departement="{{ $worker->departement }}" 
                                data-salary="{{ $worker->salary }}" 
                                data-hire_date="{{ $worker->hire_date }}" 
                                data-bs-toggle="modal" data-bs-target="#workerModal">Edit</button>
                                <form action="/workers/{{ $worker->id }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pekerja.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            @if ($workers->hasPages())
                <nav aria-label="Page navigation example">
                    <div class="d-flex justify-content-between align-items-center">
                        {{-- Go to Page Form --}}
                        @php
                            $currentPage = $workers->currentPage();  //ini untuk mendefinisikan $currentPage
                        @endphp
                        <div class="d-flex align-items-center">
                            <label for="page" class="mx-1 mb-0">Go to page:</label>
                            <form action="{{ $workers->url($currentPage) }}" method="GET" class="mx-1 mb-0">
                                <div class="input-group">
                                    <input type="number" id="page" name="page" class="form-control mx-1" 
                                        value="{{ $currentPage }}" min="1" max="{{ $workers->lastPage() }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary mx-1">Go</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- Pagination Links --}}
                        <ul class="pagination justify-content-center my-3">
                            {{-- Tombol First --}}
                            <li class="page-item">
                                <a class="page-link" href="{{ $workers->url(1) }}">First</a>
                            </li>

                            {{-- Tombol Previous --}}
                            @if ($workers->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $workers->previousPageUrl() }}">Previous</a>
                                </li>
                            @endif

                            {{-- Nomor Halaman --}}
                            @php
                                $lastPage = $workers->lastPage();
                                $paginationRange = 3;
                                $startPage = max(1, $currentPage - floor($paginationRange / 2));
                                $endPage = min($lastPage, $currentPage + floor($paginationRange / 2));

                                // Adjust startPage if there's not enough space on the left
                                if ($currentPage <= floor($paginationRange / 2)) {
                                    $endPage = min($lastPage, $paginationRange);
                                }

                                // Adjust endPage if there's not enough space on the right
                                if ($currentPage + floor($paginationRange / 2) >= $lastPage) {
                                    $startPage = max(1, $lastPage - $paginationRange + 1);
                                }
                            @endphp

                            {{-- Halaman Pertama --}}
                            @if ($startPage > 1)
                                <li class="page-item disabled">
                                    <a class="page-link">...</a>
                                </li>
                            @endif

                            {{-- Nomor Halaman --}}
                            @for ($page = $startPage; $page <= $endPage; $page++)
                                @if ($page == $currentPage)
                                    <li class="page-item active">
                                        <a class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $workers->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endfor

                            {{-- Halaman Terakhir --}}
                            @if ($endPage < $lastPage)
                                <li class="page-item disabled">
                                    <a class="page-link">...</a>
                                </li>
                            @endif

                            {{-- Tombol Next --}}
                            @if ($workers->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $workers->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link">Next</a>
                                </li>
                            @endif

                            {{-- Tombol Last --}}
                            <li class="page-item">
                                <a class="page-link" href="{{ $workers->url($lastPage) }}">Last</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            @endif
        </div>

       <!-- Modal Tambah/Edit -->
        <div class="modal fade" id="workerModal" tabindex="-1" aria-labelledby="workerModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="workerForm" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="workerModalLabel">Tambah/Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" id="form-method" value="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Jabatan</label>
                                <input type="text" name="position" id="position" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="departement" class="form-label">Departemen</label>
                                <input type="text" name="departement" id="departement" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Gaji</label>
                                <input type="number" name="salary" id="salary" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="hire_date" class="form-label">Tanggal Masuk</label>
                                <input type="date" name="hire_date" id="hire_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="modal-submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addButton = document.getElementById('add-worker-btn');
            const editButtons = document.querySelectorAll('.edit-worker-btn');
            const workerForm = document.getElementById('workerForm');
            const modalTitle = document.getElementById('workerModalLabel');
            const formMethod = document.getElementById('form-method');
            const submitButton = document.getElementById('modal-submit');
    
            // Reset Modal for "Add" Button
            addButton.addEventListener('click', function () {
                workerForm.action = "/workers"; // Route untuk menambah data
                modalTitle.textContent = "Tambah Pekerja";
                submitButton.textContent = "Simpan";
                formMethod.value = "POST";
    
                // Reset form fields
                document.getElementById('name').value = "";
                document.getElementById('position').value = "";
                document.getElementById('departement').value = "";
                document.getElementById('salary').value = "";
                document.getElementById('hire_date').value = "";
            });
    
            // Populate Modal for "Edit" Buttons
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.dataset.id;
                    const name = this.dataset.name;
                    const position = this.dataset.position;
                    const departement = this.dataset.departement;
                    const salary = this.dataset.salary;
                    const hire_date = this.dataset.hire_date;
    
                    workerForm.action = `/workers/${id}`; // Route untuk edit data
                    modalTitle.textContent = "Edit Pekerja";
                    submitButton.textContent = "Perbarui";
                    formMethod.value = "PUT";
    
                    // Populate form fields
                    document.getElementById('name').value = name;
                    document.getElementById('position').value = position;
                    document.getElementById('departement').value = departement;
                    document.getElementById('salary').value = salary;
                    document.getElementById('hire_date').value = hire_date;
                });
            });
        });
    </script>
    
</body>
</html>