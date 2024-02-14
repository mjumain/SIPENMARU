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
                    <div class="callout callout-danger">
                        <h5><i class="fas fa-info"></i> Perhatian:</h5>
                        Anda belum melukukan tes CBT, silahkan melakukan tes terlebih dahulu.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Tes Online Penerimaan Mahasiswa Baru</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-strip">
                                    <tr>
                                        <td>Username</td>
                                        <td><strong>{{ $cek_akun_cbt->user_name }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><strong>{{ $cek_akun_cbt->user_password }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><a class="btn btn-block btn-flat btn-info" href="https://cbt.umjambi.ac.id/" target="_blank">Proses</a></td>
                                    </tr>
                                </table>
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
