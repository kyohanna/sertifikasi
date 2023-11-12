@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title ml-3">Kendaraan</h4>
                        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal"
                            data-target="#tambah_kendaraan_">Tambah Kendaraan</button>
                    </div>


                    <form method="POST" action="{{ route('kendaraan_store') }}">
                        @csrf

                        <div class="modal fade" id="tambah_kendaraan_" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Tambah Kendaraan Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <label>Jenis</label>
                                        <select name="jenis" class="form-control" required>
                                            <option value="Mobil">Mobil</option>
                                            <option value="Motor">Motor</option>
                                            <option value="Truk">Truk</option>
                                        </select>
                                        <br>

                                        <label>Nama</label>
                                        <input type="text" name="nama" required class="form-control"
                                            placeholder="Nama">
                                        <br>

                                        <label>Model</label>
                                        <input type="text" name="model" required class="form-control"
                                            placeholder="Model">
                                        <br>

                                        <label>Tahun</label>
                                        <input type="number" name="tahun" required class="form-control"
                                            placeholder="Tahun">
                                        <br>

                                        <label>Jumlah Penumpang</label>
                                        <input type="number" name="jumlah_penumpang" required class="form-control"
                                            placeholder="Jumlah Penumpang">
                                        <br>

                                        <label>Manufaktur</label>
                                        <input type="text" name="manufaktur" required class="form-control"
                                            placeholder="Manufaktur">
                                        <br>

                                        <label>Harga</label>
                                        <input type="number" name="harga" required class="form-control"
                                            placeholder="Rp...">
                                        <br>

                                        <!-- Mobil -->
                                        <div id="mobil" style="display:none;">
                                            <label>Bahan Bakar</label>
                                            <input type="text" name="bahan_bakar" class="form-control"
                                                placeholder="Bahan Bakar">
                                            <br>

                                            <label>Luas Bagasi</label>
                                            <input type="number" name="luas_bagasi" class="form-control"
                                                placeholder="m²">
                                            <br>
                                        </div>

                                        <!-- Truk -->
                                        <div id="truk" style="display:none;">
                                            <label>Jumlah Roda</label>
                                            <input type="number" name="jumlah_roda" class="form-control"
                                                placeholder="Jumlah Roda">
                                            <br>

                                            <label>Luas Area Kargo</label>
                                            <input type="number" name="luas_kargo" class="form-control"
                                                placeholder="m²">
                                            <br>
                                        </div>

                                        <!-- Motor -->
                                        <div id="motor" style="display:none;">
                                            <label>Ukuran Bagasi</label>
                                            <input type="number" name="ukuran_bagasi" class="form-control"
                                                placeholder="Liter (L)">
                                            <br>

                                            <label>Kapasitas Bensin</label>
                                            <input type="number" name="kapasitas_bensin" class="form-control"
                                                placeholder="Liter (L)">
                                            <br>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title ml-3">Mobil</h4>
                    </div>

                    <div class="card-body ml-3">
                        <div class="table-responsive">
                            <table id="table-datatable" class="table">
                                <thead class=" text-primary">
                                    <th class="text-left no-bold">No</th>
                                    <th class="text-left no-bold">Nama</th>
                                    <th class="text-left no-bold">Model</th>
                                    <th class="text-left no-bold">Tahun</th>
                                    <th class="text-left no-bold" style="width: 3%;">Jumlah Penumpang</th>
                                    <th class="text-left no-bold">Manufaktur</th>
                                    <th class="text-left no-bold"style="width: 5%;">Bahan Bakar</th>
                                    <th class="text-left no-bold" style="width: 5%;">Luas Bagasi</th>
                                    <th class="text-left no-bold">Harga</th>
                                    <th class="text-left no-bold">Opsi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($mobel as $mobil)
                                        <tr>
                                            <td class="text-left">{{ $count++ }}</td>
                                            <td class="text-left">{{ $mobil->nama }}</td>
                                            <td class="text-left">{{ $mobil->model }}</td>
                                            <td class="text-left">{{ $mobil->tahun }}</td>
                                            <td class="text-center" style="width: 3%;">{{ $mobil->jumlah_penumpang }}</td>
                                            <td class="text-left">{{ $mobil->manufaktur }}</td>
                                            <td class="text-left" style="width: 5%;">{{ $mobil->bahan_bakar }}</td>
                                            <td class="text-left" style="width: 3%;">{{ $mobil->luas_bagasi }}</td>
                                            <td class="text-left">Rp. {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                                            <td class="text-left">
                                                <div class="d-flex justify-content-left align-items-left" name="add">
                                                    <button type="button" class="btn btn-secondary btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#update_mobil_{{ $mobil->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#hapus_mobil_{{ $mobil->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                <form method="POST" action="{{ route('kendaraan_update') }}">
                                                    <div class="modal fade" id="update_mobil_{{ $mobil->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Data
                                                                        Kendaraan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    {{ method_field('PUT') }}

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $mobil->id }}">

                                                                    <input type="hidden" name="jenis"
                                                                        value="{{ $mobil->jenis }}">

                                                                        <div class="form-group" style="width:100%">
                                                                            <label class="text-dark">Nama</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control"
                                                                                value="{{ $mobil->nama }}"
                                                                                style="width:100%">
                                                                        </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Model</label>
                                                                        <input type="text" name="model"
                                                                            class="form-control"
                                                                            value="{{ $mobil->model }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Tahun</label>
                                                                        <input type="number" name="tahun"
                                                                            class="form-control"
                                                                            value="{{ $mobil->tahun }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Jumlah Penumpang</label>
                                                                        <input type="number" name="jumlah_penumpang"
                                                                            class="form-control"
                                                                            value="{{ $mobil->jumlah_penumpang }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Manufaktur</label>
                                                                        <input type="text" name="manufaktur"
                                                                            class="form-control"
                                                                            value="{{ $mobil->manufaktur }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Harga</label>
                                                                        <input type="number" name="harga"
                                                                            class="form-control"
                                                                            value="{{ $mobil->harga }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Bahan Bakar</label>
                                                                        <input type="text" name="bahan_bakar"
                                                                            class="form-control"
                                                                            value="{{ $mobil->bahan_bakar }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Luas Bagasi</label>
                                                                        <input type="number" name="luas_bagasi"
                                                                            class="form-control"
                                                                            value="{{ $mobil->luas_bagasi }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="ti-close m-r-5 f-s-12"></i> Tutup
                                                                    </button>
                                                                    <span style="margin-right: 10px;"></span>
                                                                    <button type="submit" class="btn btn-primary"></i>
                                                                        Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form method="POST"
                                                    action="{{ route('kendaraan_delete', ['id' => $mobil->id]) }}">
                                                    <div class="modal fade" id="hapus_mobil_{{ $mobil->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Peringatan!
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <p>Apakah anda yakin ingin menghapus data kendaraan ini?
                                                                    </p>

                                                                    @csrf
                                                                    {{ method_field('DELETE') }}


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="ti-close m-r-5 f-s-12"></i> Batal
                                                                    </button>
                                                                    <span style="margin-right: 10px;"></span>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fa fa-trash"></i> Hapus
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title ml-3">Motor</h4>
                    </div>

                    <div class="card-body ml-3">
                        <div class="table-responsive">
                            <table id="table-datatable2" class="table">
                                <thead class="text-primary">
                                    <th class="text-left no-bold">No</th>
                                    <th class="text-left no-bold">Nama</th>
                                    <th class="text-left no-bold">Model</th>
                                    <th class="text-left no-bold">Tahun</th>
                                    <th class="text-left no-bold" style="width: 5%;">Jumlah Penumpang</th>
                                    <th class="text-left no-bold">Manufaktur</th>
                                    <th class="text-left no-bold">Kapasitas Bensin</th>
                                    <th class="text-left no-bold" style="width: 3%;">Ukuran Bagasi</th>
                                    <th class="text-left no-bold">Harga</th>
                                    <th class="text-left no-bold">Opsi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($moter as $motor)
                                        <tr>
                                            <td class="text-left">{{ $count++ }}</td>
                                            <td class="text-left">{{ $motor->nama }}</td>
                                            <td class="text-left">{{ $motor->model }}</td>
                                            <td class="text-left">{{ $motor->tahun }}</td>
                                            <td class="text-center" style="width: 5%;">{{ $motor->jumlah_penumpang }}
                                            </td>
                                            <td class="text-left">{{ $motor->manufaktur }}</td>
                                            <td class="text-left" style="width: 3%;">{{ $motor->ukuran_bagasi }}</td>
                                            <td class="text-left">{{ $motor->kapasitas_bensin }}</td>
                                            <td class="text-left">Rp. {{ number_format($motor->harga, 0, ',', '.') }}</td>
                                            <td class="text-left">
                                                <div class="d-flex justify-content-left align-items-left" name="add">
                                                    <button type="button" class="btn btn-secondary btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#update_motor_{{ $motor->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#hapus_motor_{{ $motor->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                <form method="POST" action="{{ route('kendaraan_update') }}">
                                                    <div class="modal fade" id="update_motor_{{ $motor->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Data
                                                                        Kendaraan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    {{ method_field('PUT') }}

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $motor->id }}">

                                                                    <input type="hidden" name="jenis"
                                                                        value="{{ $motor->jenis }}">

                                                                        <div class="form-group" style="width:100%">
                                                                            <label class="text-dark">Nama</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control"
                                                                                value="{{ $motor->nama }}"
                                                                                style="width:100%">
                                                                        </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Model</label>
                                                                        <input type="text" name="model"
                                                                            class="form-control"
                                                                            value="{{ $motor->model }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Tahun</label>
                                                                        <input type="number" name="tahun"
                                                                            class="form-control"
                                                                            value="{{ $motor->tahun }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Jumlah Penumpang</label>
                                                                        <input type="number" name="jumlah_penumpang"
                                                                            class="form-control"
                                                                            value="{{ $motor->jumlah_penumpang }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Manufaktur</label>
                                                                        <input type="text" name="manufaktur"
                                                                            class="form-control"
                                                                            value="{{ $motor->manufaktur }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Harga</label>
                                                                        <input type="number" name="harga"
                                                                            class="form-control"
                                                                            value="{{ $motor->harga }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Ukuran Bagasi</label>
                                                                        <input type="text" name="ukuran_bagasi"
                                                                            class="form-control"
                                                                            value="{{ $motor->ukuran_bagasi }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Kapasitas Bensin</label>
                                                                        <input type="number" name="kapasitas_bensin"
                                                                            class="form-control"
                                                                            value="{{ $motor->kapasitas_bensin }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="ti-close m-r-5 f-s-12"></i> Tutup
                                                                    </button>
                                                                    <span style="margin-right: 10px;"></span>
                                                                    <button type="submit" class="btn btn-primary"></i>
                                                                        Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form method="POST"
                                                    action="{{ route('kendaraan_delete', ['id' => $motor->id]) }}">
                                                    <div class="modal fade" id="hapus_motor_{{ $motor->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Peringatan!
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <p>Apakah anda yakin ingin menghapus data kendaraan ini?
                                                                    </p>

                                                                    @csrf
                                                                    {{ method_field('DELETE') }}


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="ti-close m-r-5 f-s-12"></i> Batal
                                                                    </button>
                                                                    <span style="margin-right: 10px;"></span>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fa fa-trash"></i> Hapus
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title ml-3">Truk</h4>
                    </div>
                    <div class="card-body ml-3">
                        <div class="table-responsive">
                            <table id="table-datatable3" class="table">
                                <thead class=" text-primary">
                                    <th class="text-left no-bold">No</th>
                                    <th class="text-left no-bold">Nama</th>
                                    <th class="text-left no-bold">Model</th>
                                    <th class="text-left no-bold">Tahun</th>
                                    <th class="text-left no-bold" style="width: 5%;">Jumlah Penumpang</th>
                                    <th class="text-left no-bold">Manufaktur</th>
                                    <th class="text-left no-bold" style="width: 3%;">Jumlah Roda Ban</th>
                                    <th class="text-left no-bold" style="width: 3%;">Luas Kargo</th>
                                    <th class="text-left no-bold">Harga</th>
                                    <th class="text-left no-bold">Opsi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($trek as $truk)
                                        <tr>
                                            <td class="text-left">{{ $count++ }}</td>
                                            <td class="text-left">{{ $truk->nama }}</td>
                                            <td class="text-left">{{ $truk->model }}</td>
                                            <td class="text-left">{{ $truk->tahun }}</td>
                                            <td class="text-center" style="width: 5%;">{{ $truk->jumlah_penumpang }}</td>
                                            <td class="text-left">{{ $truk->manufaktur }}</td>
                                            <td class="text-left" style="width: 3%;">{{ $truk->jumlah_roda }}</td>
                                            <td class="text-left" style="width: 3%;">{{ $truk->luas_kargo }}</td>
                                            <td class="text-left">Rp. {{ number_format($truk->harga, 0, ',', '.') }}</td>
                                            <td class="text-left">
                                                <div class="d-flex justify-content-left align-items-left" name="add">
                                                    <button type="button" class="btn btn-secondary btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#update_truk_{{ $truk->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#hapus_truk_{{ $truk->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                <form method="POST" action="{{ route('kendaraan_update') }}">
                                                    <div class="modal fade" id="update_truk_{{ $truk->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kendaraan</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    {{ method_field('PUT') }}

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $truk->id }}">

                                                                    <input type="hidden" name="jenis"
                                                                        value="{{ $truk->jenis }}">

                                                                        <div class="form-group" style="width:100%">
                                                                            <label class="text-dark">Nama</label>
                                                                            <input type="text" name="nama"
                                                                                class="form-control"
                                                                                value="{{ $truk->nama }}"
                                                                                style="width:100%">
                                                                        </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Model</label>
                                                                        <input type="text" name="model"
                                                                            class="form-control"
                                                                            value="{{ $truk->model }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Tahun</label>
                                                                        <input type="number" name="tahun"
                                                                            class="form-control"
                                                                            value="{{ $truk->tahun }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Jumlah Penumpang</label>
                                                                        <input type="number" name="jumlah_penumpang"
                                                                            class="form-control"
                                                                            value="{{ $truk->jumlah_penumpang }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Manufaktur</label>
                                                                        <input type="text" name="manufaktur"
                                                                            class="form-control"
                                                                            value="{{ $truk->manufaktur }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Harga</label>
                                                                        <input type="number" name="harga"
                                                                            class="form-control"
                                                                            value="{{ $truk->harga }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Jumlah Roda Ban</label>
                                                                        <input type="text" name="jumlah_roda"
                                                                            class="form-control"
                                                                            value="{{ $truk->jumlah_roda }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Luas Area Kargo</label>
                                                                        <input type="number" name="luas_kargo"
                                                                            class="form-control"
                                                                            value="{{ $truk->luas_kargo }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="ti-close m-r-5 f-s-12"></i>Tutup</button>
                                                                    <span style="margin-right: 10px;"></span>
                                                                    <button type="submit" class="btn btn-primary"></i> Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form method="POST"
                                                    action="{{ route('kendaraan_delete', ['id' => $truk->id]) }}">
                                                    <div class="modal fade" id="hapus_truk_{{ $truk->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Peringatan!
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <p>Apakah anda yakin ingin menghapus data kendaraan ini?
                                                                    </p>

                                                                    @csrf
                                                                    {{ method_field('DELETE') }}


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">
                                                                        <i class="ti-close m-r-5 f-s-12"></i> Batal
                                                                    </button>
                                                                    <span style="margin-right: 10px;"></span>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        <i class="fa fa-trash"></i> Hapus
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        th.no-bold {
            font-weight: 300 !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisSelect = document.querySelector('select[name="jenis"]');
            const mobil = document.getElementById('mobil');
            const truk = document.getElementById('truk');
            const motor = document.getElementById('motor');

            toggleAdditionalFields(jenisSelect.value);

            jenisSelect.addEventListener('change', function() {
                toggleAdditionalFields(this.value);
            });

            function toggleAdditionalFields(selectedType) {
                mobil.style.display = (selectedType === 'Mobil') ? 'block' : 'none';
                truk.style.display = (selectedType === 'Truk') ? 'block' : 'none';
                motor.style.display = (selectedType === 'Motor') ? 'block' : 'none';
            }
        });
    </script>
@endsection
