@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-success">
                        <h5>Notifikasi</h5>
                        <p>Terima kasih telah mengikuti seleksi penerimaan mahasiswa Universitas Muhammadiyah Jambi Tahun
                            Akademik 2024/2025</p>
                    </div>
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
                            <h5 class="m-0">Biodata Pendaftaran</h5>
                        </div>
                        <div class="card-body ">
                            <table class="table table-responsive">
                                <tr>
                                    <td>Nama Mahasiswa</td>
                                    <td>{{ $biodata->nama_mahasiswa }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Induk Kependudukan</td>
                                    <td>{{ $biodata->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Induk Siswa Nasional</td>
                                    <td>{{ $biodata->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>{{ $biodata->nama_prodi }}</td>
                                </tr>
                                <tr>
                                    <td>Jalur Pendaftaran</td>
                                    <td>{{ $biodata->jalur_pendaftaran }}</td>
                                </tr>
                                <tr>
                                    <td>Reguler</td>
                                    <td>{{ $biodata->kelas_perkuliahan }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Pokok Mahasiswa</td>
                                    <td>{{ $biodata->npm }}</td>
                                </tr>
                                <tr>
                                    <td>File KTP</td>
                                    <td><img src="{{ url(Storage::url($biodata->ktp)) }}" alt="" title="" />asdas
                                    </td>
                                </tr>

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
