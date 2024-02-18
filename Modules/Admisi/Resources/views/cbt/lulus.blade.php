@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-success">
                        <h4>Selamat, anda dinyatakan <b>LULUS</b> dalam proses seleksi penerimaan mahasiswa baru Universitas
                            Muhammadiyah Jambi Tahun Akademik 2024/2025</h4>
                        <a href="{{ route('admisi-pembayaran-spp.index') }}"><button class="btn btn-sm btn-success">Lanjutkan</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
