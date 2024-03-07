@extends('component.template')
@section('content')
    <main class="main-wrapper">
        <div class="container-fluid">
            <div class="inner-contents">

                <!-- Table Six -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 p-5 pb-0">
                        <h4 class="mb-0">Data Simpanan</h4>
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
                                        <th>Kategori</th>
                                        <th>Nama Penyetor</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($simpanan as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->kategori->nama }}</td>
                                            <td>{{ $item->nama_penyetor }}</td>
                                            <td>Rp.{{ number_format($item->jumlah) }}</td>
                                            <td>{{ $item->tanggal }}</td>
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
                                                            <a href="/simpanan/delete/{{ $item->id }}"
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
                                                        <form method="POST" action="/simpanan/edit/{{ $item->id }}">
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
                                                                                <option value="{{ $item->id_user }}"
                                                                                    selected>
                                                                                    {{ $item->user->name }}</option>
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
                                                                                class="form-label">Kategori</label>
                                                                            <select name="id_kategori" id="id_kategori"
                                                                                class="form-control" required>
                                                                                <option value="{{ $item->id_kategori }}"
                                                                                    selected>
                                                                                    {{ $item->kategori->nama }}</option>
                                                                                @foreach ($kategori as $data)
                                                                                    <option value="{{ $data->id }}">
                                                                                        {{ $data->nama }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Nama Penyetor</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nama_penyetor"
                                                                                id="validationDefault01"
                                                                                value="{{ $item->nama_penyetor }}" required
                                                                                placeholder="Masukan nama penyetor">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Tanggal Bayar</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tanggal" value="{{ $item->tanggal }}"
                                                                                id="validationDefault01" required
                                                                                placeholder="Pilih tanggal bayar">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Jumlah Bayar</label>
                                                                            <input type="text" class="form-control"
                                                                                name="jumlah"
                                                                                value="{{ $item->jumlah }}"
                                                                                id="jumlah" required
                                                                                placeholder="Masukan jumlah bayar">
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
                            <form method="POST" action="/simpanan/create">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Nama
                                                    User/Anggota</label>
                                                <select name="id_user" id="id_user_add" class="form-control user-select"
                                                    onchange="clearJumlah()" required>
                                                    <option value="" selected disabled>-
                                                    </option>
                                                    @foreach ($user as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Kategori</label>
                                                <select name="id_kategori" id="id_kategori_add" class="form-control"
                                                    required onchange="getJumlah()">
                                                    <option value="" selected disabled>Pilih nama kategori</option>
                                                    @foreach ($kategori as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Nama Penyetor</label>
                                                <input type="text" class="form-control" name="nama_penyetor"
                                                    id="validationDefault01" required placeholder="Masukan nama penyetor">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Tanggal Bayar</label>
                                                <input type="date" class="form-control" name="tanggal"
                                                    id="validationDefault01" required placeholder="Pilih tanggal bayar">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Jumlah Bayar</label>
                                                <input type="text" class="form-control" name="jumlah"
                                                    id="jumlah_bayar_add" required placeholder="Masukan jumlah bayar">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="validationDefault01" class="form-label">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="" cols="30" rows="2"></textarea>
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
@section('script')
    <script>
        function clearJumlah() {
            document.getElementById('id_kategori_add').value = "";
            document.getElementById('jumlah_bayar_add').value = "";

        }

        function getJumlah() {
            const userSelect = document.getElementById('id_user_add').value;
            const kategori = document.getElementById('id_kategori_add').value;
            console.log(userSelect + ' ' + kategori);
            // const kategori = kategoriSelect.options[kategoriSelect.selectedIndex].text;

            if (kategori == 1 || kategori == 2) {
                $.get("/simpanan/getJumlah/" + userSelect + "/" + kategori, function(data, status) {
                    if (kategori == 1) {
                        document.getElementById('jumlah_bayar_add').value = data.iuran_pokok;
                    } else {
                        document.getElementById('jumlah_bayar_add').value = data.iuran_wajib;
                    }
                    // console.log(data.iuran_wajib)
                });
            }

        }
        // document.addEventListener('DOMContentLoaded', function() {
        //     const userSelect = document.getElementById('id_user');
        //     const kategoriSelect = document.getElementById('id_kategori');
        //     const jumlahInput = document.getElementById('jumlah');
        // });
        $(document).ready(function() {
            $('.user-select').select2({
                dropdownParent: $('#tambahModal')
            });
        });
    </script>
@endsection
