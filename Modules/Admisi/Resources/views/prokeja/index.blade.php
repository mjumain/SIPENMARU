@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Selamat datang {{ ucwords(auth()->user()->name) }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-body">
                            <form action="{{ route('admin-admisi-prokeja.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Program Studi</label>
                                            <select name="kode_prodi" id="" class="form-control">
                                                <option selected disabled value>== PILIH PROGRAM STUDI ==</option>
                                                @foreach ($prodis as $item)
                                                    <option value="{{ $item->kode_prodi }}">{{ $item->nama_prodi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Jalur Pendaftaran</label>
                                            <select name="jalur_pendaftaran_id" id="" class="form-control">
                                                <option selected disabled value>== PILIH JALUR PENDAFTARAN ==</option>
                                                @foreach ($jalur_pendaftarans as $item)
                                                    <option value="{{ $item->id }}">{{ $item->jalur_pendaftaran }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kelas Perkuliahan</label>
                                            <select name="kelas_id" id="" class="form-control">
                                                <option selected disabled value>== PILIH KELAS PERKULIAHAN ==</option>
                                                @foreach ($kelass as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kelas_perkuliahan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-block btn-flat"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0"></h5>
                            <div class="card-tools">
                                <a href="{{ route('admin-admisi-prokeja.create') }}" class="btn btn-tool"><i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>Kode Prodi</th>
                                    <th>Nama Prodi</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Kelas</th>
                                </thead>
                                <tbody>
                                    @foreach ($prokejas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_prodi }}</td>
                                            <td>{{ $item->nama_prodi }}</td>
                                            <td>{{ $item->jalur_pendaftaran }}</td>
                                            <td>{{ $item->kelas_perkuliahan }}</td>
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
@push('js')
@endpush
