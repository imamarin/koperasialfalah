@extends('component.template')
@section('content')
    <main class="main-wrapper">
        <div class="container-fluid">
            <div class="inner-contents">

                <!-- Table Six -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 p-5 pb-0">
                        <h4 class="mb-0">Data Jenis</h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex justify-content-end align-items-end">
                            <span class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#tambahModal">Tambah</span>
                        </div>
                        <div class="table-responsive">
                            <table id="table-6" class="display text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenis as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->nama }}</td>
                                            {{-- <td>
                                                <a href="#" class="btn btn-icon btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}"><i
                                                        class="bi bi-trash fs-18"></i></a>
                                                <a href="#" class="btn btn-icon btn-sm btn-warning"
                                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i
                                                        class="bi bi-pencil-square fs-18"></i></a>
                                            </td> --}}
                                            {{-- modalHapus --}}
                                            {{-- <div class="modal modal-md fade" id="deleteModal{{ $item->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title text-white">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                class="btn btn-light-200 text-danger btn-sm px-2"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <a href="/jenis/delete/{{ $item->id }}"
                                                                class="btn btn-red btn-sm  px-2">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- modalEdit --}}
                                            {{-- <div class="modal modal-lg fade" id="editModal{{ $item->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title text-white">Edit Data Jenis</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="/jenis/edit/{{ $item->id }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Jenis</label>
                                                                            <input type="text" class="form-control"
                                                                                id="validationDefault01" name="nama"
                                                                                required value="{{ $item->nama }}"
                                                                                placeholder="Masukan nama jenis">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-light-200 text-danger btn-sm px-2"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm  px-2">Simpan
                                                                    Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- modalTambah --}}
                <div class="modal modal-lg fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title text-white">Tambah Data Jenis</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/jenis/create">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Jenis</label>
                                                <input type="text" class="form-control" name="nama"
                                                    id="validationDefault01" required placeholder="Masukan nama jenis">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-200 text-danger btn-sm px-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary btn-sm  px-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
