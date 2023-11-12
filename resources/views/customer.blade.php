@extends('master')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title ml-3">Customer</h4>
                        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal"
                            data-target="#tambah_customer_">Tambah Customer</button>
                    </div>

                    <form method="POST" action="{{ route('customer_store') }}">
                        @csrf
                        <div class="modal fade" id="tambah_customer_" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Tambah Customer Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal"aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <label>Nama</label>
                                        <input type="text" name="nama" required="required" class="form-control"
                                            placeholder="Nama">
                                        <br>

                                        <label>Alamat</label>
                                        <input type="text" name="alamat" required="required" class="form-control"
                                            placeholder="Alamat">

                                        <br>

                                        <label>Nomor Telepon</label>
                                        <input type="number" name="noTelp" required="required" class="form-control"
                                            placeholder="Nomer Telepon">

                                        <br>

                                        <label>ID Card</label>
                                        <input type="number" name="IDcard" required="required" class="form-control"
                                            placeholder="ID Card">

                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal"></i>Close</button>
                                        <button type="submit" class="btn btn-primary"></i>Save</button>
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
                                    <th class="text-left no-bold">No</th>
                                    <th class="text-left no-bold">Nama</th>
                                    <th class="text-left no-bold">Alamat</th>
                                    <th class="text-left no-bold">No Telepon</th>
                                    <th class="text-left no-bold">ID Card</th>
                                    <th class="text-left no-bold">Opsi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td class="text-left">{{ $count++ }}</td>
                                            <td class="text-left">{{ $customer->nama }}</td>
                                            <td class="text-left">{{ $customer->alamat }}</td>
                                            <td class="text-left">{{ $customer->notelp }}</td>
                                            <td class="text-left">{{ $customer->IDcard }}</td>
                                            <td class="text-left">

                                                
                                                <div class="d-flex justify-content-left align-items-left" name="add">

                                                    <button type="button" class="btn btn-secondary btn-sm ml-2"
                                                        data-toggle="modal" data-target="#update_cust_{{ $customer->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                                        data-toggle="modal" data-target="#hapus_cust_{{ $customer->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                  

                                                </div>

                                                <form method="POST" action="{{ route('customer_update') }}">
                                                    <div class="modal fade" id="update_cust_{{ $customer->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                        Customer</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    {{ method_field('PUT') }}

                                                                    <input type="hidden" name="id"
                                                                        value="{{ $customer->id }}">

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Nama</label>
                                                                        <input type="text" name="nama"
                                                                            class="form-control"
                                                                            value="{{ $customer->nama }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Alamat</label>
                                                                        <input type="text" name="alamat"
                                                                            class="form-control"
                                                                            value="{{ $customer->alamat }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">Nomor Telepon</label>
                                                                        <input type="number" name="notelp"
                                                                            class="form-control"
                                                                            value="{{ $customer->notelp }}"
                                                                            style="width:100%">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%">
                                                                        <label class="text-dark">ID Card</label>
                                                                        <input type="number" name="IDcard"
                                                                            class="form-control"
                                                                            value="{{ $customer->IDcard }}"
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
                                                    action="{{ route('customer_delete', ['id' => $customer->id]) }}">
                                                    <div class="modal fade" id="hapus_cust_{{ $customer->id }}"
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

                                                                    <p>Apakah anda yakin ingin menghapus data customer ini?
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
