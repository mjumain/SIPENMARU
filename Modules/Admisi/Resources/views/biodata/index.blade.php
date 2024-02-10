@extends('admisi::layouts.master')
@push('css')
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
                            <h5 class="m-0">Biodata</h5>
                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <label class="form-label">Program Studi Pilihan</label>
                                <select name="kode_prodi" id="kode_prodi"
                                    class="form-control mb-2 @error('kode_prodi') is-invalid @enderror">
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
                                <label class="form-label">Kelas Perkuliahan</label>
                                <select name="kelas_id" id="kelas_id"
                                    class="form-control mb-2  @error('kelas_id') is-invalid @enderror">
                                    <option selected disabled value>== PILIH KELAS PERKULIAHAN ==</option>
                                </select>
                                @error('kelas_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="form-label">Jalur Pendaftaran</label>
                                <select name="jalur_id" id="jalur_id"
                                    class="form-control mb-2  @error('kelas_id') is-invalid @enderror">
                                    <option selected disabled value>== PILIH JALUR PENDAFTARAN ==</option>
                                </select>
                                @error('jalur_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <div class="mb-3">
                                    <label class="form-label">Scan Kartu Tanda Penduduk (KTP)</label>
                                    <input class="form-control form-control-sm  @error('ktp') is-invalid @enderror"
                                        name="ktp" type="file" value="{{ old('ktp') }}">
                                    @error('ktp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Scan Kartu Keluarga (KK)</label>
                                    <input class="form-control form-control-sm @error('kk') is-invalid @enderror"
                                        name="kk" type="file" value="{{ old('kk') }}">
                                    @error('kk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Scan Ijazah/Surat Keterangan Lulus (SKL)</label>
                                    <input class="form-control form-control-sm @error('ijazah') is-invalid @enderror"
                                        name="ijazah" type="file" value="{{ old('ijazah') }}">
                                    @error('ijazah')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Berkas Pendukung Lainya</label>
                                    <input class="form-control form-control-sm @error('pendukung') is-invalid @enderror"
                                        name="pendukung" type="file" value="{{ old('pendukung') }}">
                                    @error('pendukung')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- <script src="{{ asset('') }}assets/plugins/select2/js/select2.min.js"></script> --}}
    {{-- <script type="text/javascript">
        var path = "{{ url('datasekolah') }}";

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
                                text: item.npsn + ' - ' + item.nama_sekolah + ' - ' + item.alamat +
                                    ' - ' + item.provinsi,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        var path = "{{ url('refferalagen') }}";

        $('#kode_refferal').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: "Masukan Kode Refferal atau Nama Agen",
            allowClear: Boolean($(this).data('allow-clear')),
            ajax: {
                url: path,
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.kode_refferal + ' - ' + item.name.toUpperCase(),
                                id: item.kode_refferal
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script> --}}
    <script>
        $('#kode_prodi').change(function() {
            var kode_prodi = $(this).val();
            if (kode_prodi) {
                $.ajax({
                    type: "GET",
                    url: "/prodi-kelas/" + kode_prodi,
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
                            $.each(res, function(id, kelas) {
                                $("#kelas_id").append('<option value="' + kelas.id + '">' +
                                    kelas.kelas +
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
        $('#kelas_id').change(function() {
            var kode_prodi = $("#kode_prodi").val();
            var kelas_id = $(this).val();
            if (kode_prodi && kelas_id) {
                $.ajax({
                    type: "GET",
                    url: "/prodi-jalur/" + kode_prodi + '/' + kelas_id,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res) {
                            console.log(res);
                            $.each(res, function(id, jalur) {
                                $("#jalur_id").append('<option value="' + jalur.id + '">' +
                                    jalur.jalur +
                                    '</option>');
                            });
                        } else {
                            $("#jalur_id").empty();
                        }
                    }
                });
            } else {
                $("#jalur_id").empty();
            }
        });
    </script>
@endpush
