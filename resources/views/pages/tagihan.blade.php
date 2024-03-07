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
                                <h4 class="mb-0">Bayar Tagihan</h4>
                            </div>
                        </div>

                        <div class="card-body pt-2">
                            <div class="d-flex justify-content-end align-items-end">
                                {{-- <span class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#primaryModal">Tambah</span> --}}
                            </div>
                            <div class="table-responsive">
                                <table id="table-6" class="display text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User/Anggota</th>
                                            <th>Jumlah Pinjaman</th>
                                            <th>Sisa Pinjaman</th>
                                            <th>Jumlah Bagi hasil</th>
                                            <th>Sisa Bagi hasil</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengajuan as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>Rp. {{ number_format($item->nominal_pinjaman) }}</td>
                                                @php
                                                    $total_pembayaran = 0;
                                                    $total_bagihasil = 0;
                                                @endphp
                                                @foreach ($tagihan as $value)
                                                    @if ($value->id_pengajuan == $item->id)
                                                        @if ($value->id_kategori == 3)
                                                            @php
                                                                $total_pembayaran += $value->jumlah;
                                                            @endphp
                                                        @endif

                                                        @if ($value->id_kategori == 4)
                                                            @php
                                                                $total_bagihasil += $value->jumlah;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                                <td>Rp. {{ number_format($item->nominal_pinjaman - $total_pembayaran) }}
                                                </td>
                                                <td>Rp. {{ number_format($item->nominal_bagihasil) }}</td>
                                                <td>Rp. {{ number_format($item->nominal_bagihasil - $total_bagihasil) }}
                                                </td>
                                                <td>{{ $item->tanggal_pengajuan }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-success text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#bayarModal{{ $item->id }}">BAYAR</a>
                                                </td>
                                            </tr>
                                            {{-- Bayar --}}
                                            <div class="modal modal-lg fade" id="bayarModal{{ $item->id }}"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title text-white">Bayar Tagihan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="post"
                                                            action="/tagihan/bayar/create/{{ $item->id }}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Nama Anggota</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nama" id="validationDefault01"
                                                                                required value="{{ $item->user->name }}"
                                                                                placeholder="Masukan nama kategori"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Tanggal
                                                                                Pembayaran</label>
                                                                            <input type="date" class="form-control"
                                                                                name="tanggal" id="validationDefault01"
                                                                                placeholder="Masukan nama kategori">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Kategori</label>
                                                                            <select name="id_kategori"
                                                                                id="kategoriPeminjaman" class="form-control"
                                                                                required>
                                                                                @foreach ($kategori as $data)
                                                                                    <option value="{{ $data->id }}"
                                                                                        data-type="{{ $data->type }}">
                                                                                        {{ $data->nama }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="validationDefault01"
                                                                                class="form-label">Jumlah Pembayaran</label>
                                                                            <input type="number" class="form-control"
                                                                                name="jumlah" id="validationDefault01"
                                                                                required
                                                                                placeholder="Masukan jumlah pembayaran">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Keterangan</label>
                                                                            <textarea rows="5" id="summernote" name="keterangan" class="form-control" id="biography" placeholder="" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-light-200 text-danger btn-sm px-2"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm  px-2">Simpan</button>
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
                    </div>

                </div>
            </div>
    </main>
@endsection
{{-- @section('script')

@endsection --}}
