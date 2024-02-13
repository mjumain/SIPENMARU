@extends('admisi::layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('') }}plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="callout callout-info">
                <h5>Petunjuk pengisian biodata !</h5>
                <p>Follow the steps to continue to payment.</p>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Formulir Pendaftaran Calon Mahasiswa Baru</h5>
                        </div>
                        <form action="{{ route('admisi-biodata.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Program Studi Pilihan</label>
                                    <select name="kode_prodi" id="kode_prodi"
                                        class="form-control @error('kode_prodi') is-invalid @enderror">
                                        <option selected disabled value>== PILIH PROGRAM STUDI ==</option>
                                        @foreach ($prodis as $item)
                                            <option value="{{ $item->kode_prodi }}">
                                                {{ $item->nama_prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_prodi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jalur Pendaftaran</label>
                                    <select name="jalur_id" id="jalur_id"
                                        class="form-control @error('kelas_id') is-invalid @enderror">
                                        <option selected disabled value>== PILIH JALUR PENDAFTARAN ==</option>
                                    </select>
                                    @error('jalur_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kelas Perkuliahan</label>
                                    <select name="kelas_id" id="kelas_id"
                                        class="form-control @error('kelas_id') is-invalid @enderror">
                                        <option selected disabled value>== PILIH KELAS PERKULIAHAN ==</option>
                                    </select>
                                    @error('kelas_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Registrasi KIP-K <code><i>(wajib diisi apabila anda
                                                memilih jalur Beasiswa KIP-K)</i></code></label>
                                    <input type="text"
                                        class="form-control @error('nomor_registrasi_kipk') is-invalid @enderror"
                                        placeholder="Nomor Registrasi KIP-K" name="nomor_registrasi_kipk"
                                        value="{{ old('nomor_registrasi_kipk') }}">
                                    @error('nomor_registrasi_kipk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        placeholder="Nama Lengkap" name="nama_lengkap" value="{{ auth()->user()->name }}"
                                        readonly>
                                    @error('nama_lengkap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        placeholder="Nomor Induk Kependudukan (NIK)" name="nik"
                                        value="{{ old('nik') }}">
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                        placeholder="Nomor Induk Siswa Nasional (NISN)" name="nisn"
                                        value="{{ old('nisn') }}">
                                    @error('nisn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Pokok Sekolah Nasional (NPSN)</label>
                                    <select name="npsn" id="npsn"
                                        class="form-control @error('npsn') is-invalid @enderror"></select>
                                    @error('npsn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ auth()->user()->email }}" name="email" readonly>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Whatsapp</label>
                                    <input type="text" class="form-control @error('nomor_whatsapp') is-invalid @enderror"
                                        placeholder="Nomor Whatsapp" name="nomor_whatsapp"
                                        value="{{ old('nomor_whatsapp') }}">
                                    @error('nomor_whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Scan Kartu Tanda Penduduk (KTP)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="ktp" type="file"
                                                class="custom-file-input @error('ktp') is-invalid @enderror">
                                            <label class="custom-file-label">Pilih File</label>
                                        </div>
                                    </div>
                                    @error('ktp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Scan Kartu Keluarga (KK)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="kk" type="file"
                                                class="custom-file-input @error('kk') is-invalid @enderror">
                                            <label class="custom-file-label">Pilih File</label>
                                        </div>
                                    </div>
                                    @error('kk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Scan Ijazah/Surat Keterangan Lulus (SKL)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="ijazah" type="file"
                                                class="custom-file-input @error('ijazah') is-invalid @enderror">
                                            <label class="custom-file-label">Pilih File</label>
                                        </div>
                                    </div>
                                    @error('ijazah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Berkas Pendukung Lainya <code><i>(sesuai dengan persyaratan
                                                pendaftaran)</i></code></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="pendukung" type="file"
                                                class="custom-file-input @error('pendukung') is-invalid @enderror">
                                            <label class="custom-file-label">Pilih File</label>
                                        </div>
                                        @error('pendukung')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kode Refferal atau Nama Agen</label>
                                    <select name="kode_refferal" id="kode_refferal"
                                        class="form-control @error('kode_refferal') is-invalid @enderror"></select>
                                    @error('kode_refferal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-block btn-flat"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('') }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="{{ asset('') }}plugins/select2/js/select2.full.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
    <script type="text/javascript">
        var path = "{{ url('get-npsn') }}";
        $('#npsn').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: "Masukan Nomor Pokok Siswa Nasional (NPSN) atau Nama Sekolah Anda",
            allowClear: Boolean($(this).data('allow-clear')),
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.npsn + ' - ' + item.nama_sekolah.toUpperCase() + ' - ' + item.alamat.toUpperCase() +
                                    ' - ' + item.provinsi.toUpperCase(),
                                id: item.npsn
                            }
                        })
                    };
                },
                cache: true
            }
        });

        // var path = "{{ url('refferalagen') }}";

        // $('#kode_refferal').select2({
        //     theme: 'bootstrap4',
        //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        //     placeholder: "Masukan Kode Refferal atau Nama Agen",
        //     allowClear: Boolean($(this).data('allow-clear')),
        //     ajax: {
        //         url: path,
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function(data) {
        //             return {
        //                 results: $.map(data, function(item) {
        //                     return {
        //                         text: item.kode_refferal + ' - ' + item.name.toUpperCase(),
        //                         id: item.kode_refferal
        //                     }
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // });
    </script>
    <script>
        $('#jalur_id').change(function() {
            var kode_prodi = $("#kode_prodi").val();
            var jalur_id = $(this).val();
            if (kode_prodi && jalur_id) {
                $.ajax({
                    type: "GET",
                    url: "/prodi-kelas/" + kode_prodi + '/' + jalur_id,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#kelas_id").empty();
                            $("#kelas_id").append(
                                ' <option selected disabled value>== PILIH KELAS PERKULIAHAN ==</option>'
                            );
                            $.each(res, function(id, kelas) {
                                $("#kelas_id").append('<option value="' + kelas.id + '">' +
                                    kelas.kelas +
                                    '</option>');
                            });
                        } else {
                            $("#kelas_id").empty();
                        }
                    }
                });
            } else {
                $("#kelas_id").empty();
            }
        });

        $('#kode_prodi').change(function() {
            var kode_prodi = $(this).val();
            if (kode_prodi) {
                $.ajax({
                    type: "GET",
                    url: "/prodi-jalur/" + kode_prodi,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            $("#kelas_id").empty();
                            $("#jalur_id").empty();
                            $("#jalur_id").append(
                                ' <option selected disabled value>== PILIH JALUR PENDAFTARAN ==</option>'
                            );
                            $("#kelas_id").append(
                                ' <option selected disabled value>== PILIH KELAS PERKULIAHAN ==</option>'
                            );
                            $.each(res, function(id, jalur) {
                                $("#jalur_id").append('<option value="' + jalur.id + '">' +
                                    jalur.jalur +
                                    '</option>');
                            });
                        } else {
                            $("#kelas_id").empty();
                            $("#jalur_id").empty();
                        }
                    }
                });
            } else {
                $("#kelas_id").empty();
                $("#jalur_id").empty();
            }
        });
    </script>
@endpush
