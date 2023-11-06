@extends('backend.master')
@section('backend')
<div class="card mb-4">
    <div class="card-header"><strong>Table Pelanggan</strong></div>
    <div class="card-body">
        <div class="example">
            <div class="tab-content rounded-bottom">
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('pelanggan.add') }}">
                            <button style="width: 90px; height: 38px; font-size: 16px; border-radius: 4px; float: right; padding: 2px 2px; margin-bottom: 25px;" type="button" class="btn btn-primary waves-light btn-sm waves-effect">Tambah</button>
                        </a>
                        <form method="GET" action="{{ route('pelanggan.search') }}">
                            <div class="input-group">
                                <input type="text" name="keyword" id="search-input" class="form-control" placeholder="Cari data">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Pelanggan</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">No Telp</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $data)
                            <tr>
                                <th class="text-center" max-width="15px" scope="row">{{$loop->iteration}}</th>
                                <td class="text-center" style="max-width:20px;">{{$data->kd_pelanggan}}</td> <!-- Tambahkan kolom Kode Pelanggan -->
                                <td class="text-center" style="max-width:300px;">{{$data->nama}}</td>
                                <td class="text-center" style="max-width:500px;">{{$data->alamat}}</td>
                                <td class="text-center" style="max-width:300px;">{{$data->no_telp}}</td>
                                <td class="text-center" style="max-width:70px;">
                                    <a href="{{ route('pelanggan.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-lg" style="color:white"></i></a>
                                    <a href="{{route('pelanggan.delete', $data->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg" style="color:white"></i></a>
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
@endsection
