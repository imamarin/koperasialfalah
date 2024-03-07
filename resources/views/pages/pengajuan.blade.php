@extends('component.template')
@section('content')
    <main class="main-wrapper">
        <div class="container-fluid">
            <div class="inner-contents">

                <!-- Table Six -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 p-5 pb-0">
                        <h4 class="mb-0">Data Pengajuan Pinjaman</h4>
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
                                        <th>Nama User/Anggota</th>
                                        <th>Nominal Pinjaman</th>
                                        <th>Nominal Bagihasil</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuan as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>Rp. {{ number_format($item->nominal_pinjaman) }}</td>
                                            <td>Rp. {{ number_format($item->nominal_bagihasil) }}</td>
                                            <td>{{ $item->tanggal_pengajuan }}</td>
                                            <td class="text-center">
                                                @if($item->keterangan === 'sudah lunas')
                                                    <button class="btn btn-success text-white btn-sm">{{ $item->keterangan }}</button>
                                                @else
                                                    <button class="btn text-white btn-sm" style="background-color: darkgrey">{{ $item->keterangan }}</button>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <a href="#" class="btn btn-icon btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $item->id }}"><i
                                                        class="bi bi-trash fs-18"></i></a>
                                                <a href="#" class="btn btn-icon btn-sm btn-warning"
                                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i
                                                        class="bi bi-pencil-square fs-18"></i></a>
                                            </td>
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
                                                            <a href="/tagihan/pengajuan/delete/{{ $item->id }}"
                                                                class="btn btn-red btn-sm  px-2">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- modalEdit --}}
                                            <div class="modal modal-lg fade" id="editModal{{ $item->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title text-white">Edit Data Simpanan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="/tagihan/pengajuan/edit/{{ $item->id }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Nama
                                                                                User/Anggota</label>
                                                                            <select name="id_user" id="id_user"
                                                                                class="form-control" required>
                                                                                <option value="{{ $item->id }}"
                                                                                    selected>
                                                                                    {{ $item->user->name }}
                                                                                </option>
                                                                                @foreach ($user as $data)
                                                                                    <option value="{{ $data->id }}">
                                                                                        {{ $data->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Nominal
                                                                                Pinjaman</label>
                                                                            <input type="number" name="nominal_pinjaman"
                                                                                class="form-control"
                                                                                placeholder="Masukan nominal pinjaman"
                                                                                id=""
                                                                                value="{{ $item->nominal_pinjaman }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Nominal
                                                                                Bagihasil</label>
                                                                            <input type="number" class="form-control"
                                                                                name="nominal_bagihasil"
                                                                                id="validationDefault01" required
                                                                                placeholder="Masukan nominal bagihasil"
                                                                                value="{{ $item->nominal_bagihasil }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Tanggal
                                                                                Pengajuan</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tanggal_pengajuan"
                                                                                id="validationDefault01" required
                                                                                placeholder="Pilih tanggal pengajuan"
                                                                                value="{{ $item->tanggal_pengajuan }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Keterangan</label>
                                                                            <textarea class="form-control" name="keterangan" id="" cols="30" rows="2">{{ $item->keterangan }}</textarea>
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
                                            </div>
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
                                <h5 class="modal-title text-white">Tambah Data Simpanan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="/tagihan/pengajuan/create">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Nama
                                                    User/Anggota</label>
                                                <select name="id_user" id="id_user" class="form-control" required>
                                                    <option value="" selected disabled>Pilih nama user/anggota
                                                    </option>
                                                    @foreach ($user as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Nominal
                                                    Pinjaman</label>
                                                <input type="number" name="nominal_pinjaman" class="form-control"
                                                    placeholder="Masukan nominal pinjaman" id="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Nominal
                                                    Bagihasil</label>
                                                <input type="number" class="form-control" name="nominal_bagihasil"
                                                    id="validationDefault01" required
                                                    placeholder="Masukan nominal bagihasil">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Tanggal
                                                    Pengajuan</label>
                                                <input type="date" class="form-control" name="tanggal_pengajuan"
                                                    id="validationDefault01" required
                                                    placeholder="Pilih tanggal pengajuan">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="" cols="30" rows="2"></textarea>
                                            </div>
                                        </div> --}}
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
