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
                        <div class="card-header">
                            <h5 class="m-0">Proses Pendaftaran Calon Mahasiswa Baru</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div>
                                    <i class="fas fa-users bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Membuat akun dilaman <a href="http://sipenmaru.umjambi.ac.id">https://sipenmaru.umjambi.ac.id</a></h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-users bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Melengkapi biodata</h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-users bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Melakukan Pembayaran Pendaftaran</h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-users bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Melakukan tes online </h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-users bg-info"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border">Melakukan pembayaran SPP</h3>
                                    </div>
                                </div>
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
