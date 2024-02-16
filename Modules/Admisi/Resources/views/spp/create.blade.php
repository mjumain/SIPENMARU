@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-success">
                        <form action="{{ route('admisi-pembayaran-spp.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select name="metode_pembayaran" id="metode_pembayaran"
                                    class="form-control @error('metode_pembayaran') is-invalid @enderror">
                                    <option selected disabled value>== PILIH METODE PEMBAYARAN ==</option>
                                    <option value="1">Lunas</option>
                                    <option value="2">2xCicilan</option>
                                </select>
                                @error('metode_pembayaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p><button type="submit" class="btn btn-success btn-sm">Lanjutkan</button></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
