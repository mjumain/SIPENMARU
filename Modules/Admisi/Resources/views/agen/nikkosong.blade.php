@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-danger">
                        <div class="mb-3">
                            <h5>Perhatian</h5>
                            <p>Mohon memasukan Nomor Induk Kependudukan (NIK) dengan benar, Nomor Induk Kependudukan (NIK) tersebut digunakan untuk proses validasi pencairan uang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="callout callout-success">
                        <form action="{{ route('admin-agen-dashboard.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nomor Induk Kependudukan</label>
                                <input type="text" name="nik" class="form-control"
                                    placeholder="Nomor Induk Kependudukan">
                                @error('nik')
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
