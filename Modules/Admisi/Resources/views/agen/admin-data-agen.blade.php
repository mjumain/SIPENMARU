@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Data Agen Penerimaan Mahasiswa Baru</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table ">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>Kode Referral</th>
                                </thead>
                                <tbody>
                                    @foreach ($agens as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->kode_referral }}</td>
                                            <td>
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
@push('js')
@endpush
