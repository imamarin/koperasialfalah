@extends('component.template')

@section('content')
    <main class="main-wrapper">
        <div class="container-fluid">
            <div class="inner-contents">

                <!-- Table Six -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 p-5 pb-0">
                        <div class="row">
                            <div class="col-md-6 col-12 text-muted">
                                <h4 class="mb-0">Data Admin</h4>
                            </div>
                        </div>

                        <div class="card-body pt-2">
                            <div class="d-flex justify-content-end align-items-end">
                                <span class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#primaryModal">Tambah</span>
                            </div>
                            <div class="table-responsive">
                                <table id="table-6" class="display text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Anggota</th>
                                            <th>Email</th>
                                            <th>Iuran Wajib</th>
                                            <th>Iuran Pokok</th>
                                            <th>No Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <div class="employee d-flex gap-2 flex-wrap">
                                                        <div class="profilepicture flex-shrink-0 d-none d-xl-block">
                                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="img"
                                                                width="50">
                                                        </div>
                                                        <div class="description mt-2">
                                                            <h6>{{ $item->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ 'Rp.' . ($item->iuran_wajib !== null ? $item->iuran_wajib : 0) }}
                                                </td>
                                                <td>{{ 'Rp.' . ($item->iuran_pokok !== null ? $item->iuran_pokok : 0) }}
                                                </td>
                                                <td>{{ $item->nohp }}</td>
                                                <td class="text-center">
                                                    <a href="#"
                                                        class="btn btn-icon btn-sm btn-danger"data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $item->id }}"><i
                                                            class="bi bi-trash fs-18"></i></a>
                                                    <a href="#" class="btn btn-icon btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}"><i
                                                            class="bi bi-pencil-square fs-18"></i></a>
                                                </td>
                                            </tr>
                                            {{-- modalHapus --}}
                                            <div class="modal modal-md fade" id="deleteModal{{ $item->id }}"
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
                                                            <a href="/users/admin/delete{{ $item->id }}"
                                                                class="btn btn-red btn-sm  px-2">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Edit-->
                                            <div class="modal modal-lg fade" id="editModal{{ $item->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title text-white">Tambah Data Admin</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="/users/admin/edit/{{ $item->id }}"
                                                            enctype="multipart/form-data" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">No User</label>
                                                                            <input type="number" class="form-control"
                                                                                name="no_user" id="validationDefault01"
                                                                                value="{{ $item->no_user }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Nama
                                                                                Lengkap</label>
                                                                            <input type="text" class="form-control"
                                                                                name="name" id="validationDefault02"
                                                                                value="{{ $item->name }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Email</label>
                                                                            <input type="email" class="form-control"
                                                                                name="email" id="validationDefault03"
                                                                                value="{{ $item->email }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault03"
                                                                                class="form-label">Password</label>
                                                                            <input type="password" class="form-control"
                                                                                name="password" id="validationDefault04">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">No
                                                                                Handphone</label>
                                                                            <input type="number" class="form-control"
                                                                                name="nohp" id="validationDefault05"
                                                                                value="{{ $item->nohp }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Alamat</label>
                                                                            <textarea rows="5" id="summernote" name="alamat" class="form-control" name="biography" id="biography"
                                                                                placeholder="" required>{{ $item->alamat }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Iuran
                                                                                Wajib</label>
                                                                            <input type="number" class="form-control"
                                                                                name="iuran_wajib" id=""
                                                                                value="{{ $item->iuran_wajib }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Iuran
                                                                                Pokok</label>
                                                                            <input type="number" class="form-control"
                                                                                name="iuran_pokok" id=""
                                                                                value="{{ $item->iuran_pokok }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">KTP</label>
                                                                            <div class="input-group">
                                                                                <input type="file" class="form-control"
                                                                                    name="ktp" id="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">foto Profil</label>
                                                                            <div class="input-group">
                                                                                <input type="file" class="form-control"
                                                                                    name="foto" id="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-light-200 text-danger btn-sm px-2"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm  px-2">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal modal-lg fade" id="primaryModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title text-white">Tambah Data Admin</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/users/admin/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault01" class="form-label">No
                                                            User</label>
                                                        <input type="number" class="form-control" name="no_user"
                                                            id="validationDefault01" placeholder="Masukan no user"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault01" class="form-label">Nama
                                                            Lengkap</label>
                                                        <input type="text" class="form-control" name="name"
                                                            id="validationDefault02" placeholder="Masukan nama lengkap"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault01" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                            id="validationDefault03" placeholder="Masukan email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault03"
                                                            class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password"
                                                            id="validationDefault04"
                                                            placeholder="Masukan password"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault01" class="form-label">No
                                                            Handphone</label>
                                                        <input type="number" class="form-control" name="nohp"
                                                            id="validationDefault05" placeholder="Masukan no handphone"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Alamat</label>
                                                        <textarea rows="5" id="summernote" name="alamat" class="form-control" name="biography" id="biography"
                                                            placeholder="Masukan alamat" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault01" class="form-label">Iuran
                                                            Wajib</label>
                                                        <input type="number" class="form-control" name="iuran_wajib"
                                                            id="" placeholder="Masukan Iuran Wajib" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="validationDefault01" class="form-label">Iuran
                                                            Pokok</label>
                                                        <input type="number" class="form-control" name="iuran_pokok"
                                                            id="" placeholder="Masukan Iuran Pokok" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">KTP</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" name="ktp"
                                                                id="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">foto Profil</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" name="foto"
                                                                id="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-200 text-danger btn-sm px-2"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-sm  px-2">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </main>
@endsection
