@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title ml-3">Order</h4>
                        <button type="button" class="btn btn-primary btn-sm ml-2 mr-2" data-toggle="modal"
                            data-target="#tambah_order_">Tambah Order Baru</button>
                    </div>

                    <form method="POST" action="{{ route('order_store') }}">
                        @csrf
                        <div class="modal fade" id="tambah_order_" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Tambah Order Baru
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <label>Customer</label>
                                        <select class="form-control" name="customer" required="required">
                                            @foreach ($customers as $index => $c)
                                                <option {{ old('customer') == $c->id ? "selected='selected'" : '' }}
                                                    value="{{ $c->id }}">
                                                    {{ $c->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>

                                        <label>Kendaraan</label>
                                        <select class="form-control" name="kendaraan" required="required">
                                            @foreach ($kendaraans as $index => $k)
                                                <option {{ old('kendaraan') == $k->id ? "selected='selected'" : '' }}
                                                    value="{{ $k->id }}">
                                                    {{ $k->jenis }} - {{ $k->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>

                                        <label>Jumlah Kendaraan</label>
                                        <input type="number" name="jumlah_kendaraan" required="required"
                                            class="form-control" placeholder="Jumlah Kendaraan">
                                        <br>

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
                    </div>
                    <div class="card-body ml-3">
                        <div class="table-responsive">
                            <table id="table-datatable" class="table">
                                <thead class="text-primary">
                                    <th class="text-left no-bold" style="width: 3%;">No</th>
                                    <th class="text-left no-bold" style="width: 5%;">Nama Customer</th>
                                    <th class="text-left no-bold" style="width: 5%;">Jenis Kendaraan</th>
                                    <th class="text-left no-bold" style="width: 5%;">Nama Kendaraan</th>
                                    <th class="text-left no-bold" style="width: 3%;">Jumlah Kendaraan</th>
                                    <th class="text-left no-bold">Harga</th>
                                    <th class="text-left no-bold">Total Harga</th>
                                    <th class="text-left no-bold">Opsi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="text-left" style="width: 3%;">{{ $count++ }}</td>
                                            <td class="text-left">{{ $order->customer->nama }}</td>
                                            <td class="text-left" style="width: 5%;">{{ $order->kendaraan->jenis }}</td>
                                            <td class="text-left">{{ $order->kendaraan->nama }}</td>
                                            <td class="text-left" style="width: 3%;">{{ $order->jumlah_kendaraan }}</td>
                                            <td class="text-left">Rp.
                                                {{ number_format($order->kendaraan->harga, 0, ',', '.') }}</td>
                                            <td class="text-left">Rp. {{ number_format($order->total_harga, 0, ',', '.') }}
                                            </td>
                                            <td class="text-left">
                                                <div class="d-flex justify-content-left align-items-left" name="add">
                                                    <button type="button" class="btn btn-secondary btn-sm ml-2"
                                                        data-toggle="modal"
                                                        data-target="#update_order_{{ $order->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                                        data-toggle="modal" data-target="#hapus_order_{{ $order->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>

                                                <form method="POST" action="{{ route('order_update') }}">
                                                    <div class="modal fade" id="update_order_{{ $order->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Data Order</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    {{ method_field('PUT') }}

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $order->id }}">

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Jenis Kendaraan</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $order->kendaraan->jenis }}"
                                                                            readonly style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Nama Kendaraan</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $order->kendaraan->nama }}" readonly
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Jumlah Kendaraan</label>
                                                                        <input type="number" name="jumlah kendaraan"
                                                                            class="form-control"
                                                                            value="{{ $order->jumlah_kendaraan }}"
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
                                                    action="{{ route('order_delete', ['id' => $order->id]) }}">
                                                    <div class="modal fade" id="hapus_order_{{ $order->id }}"
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

                                                                    <p>Apakah anda yakin ingin menghapus data order ini?
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
@endsection
