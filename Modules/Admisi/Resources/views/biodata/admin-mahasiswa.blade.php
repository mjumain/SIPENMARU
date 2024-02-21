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
                            <h5 class="m-0">Formulir Pendaftaran Calon Mahasiswa Baru</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table ">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Prodi</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Kelas</th>
                                    <th>Pembayaran</th>
                                </thead>
                                <tbody>
                                    {{-- @dd($cetak) --}}
                                    @foreach ($cetak as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['nama_mahasiswa'] }}</td>
                                            <td>{{ $item['nama_prodi'] }}</td>
                                            <td>{{ $item['jalur_pendaftaran'] }}</td>
                                            <td>{{ $item['kelas_perkuliahan'] }}</td>
                                            <td>
                                                @if (count($item['pembayaran']))
                                                    @foreach ($item['pembayaran'] as $value)
                                                        <p>
                                                            @php
                                                                echo Str::substr($value['nomor_invoice'], 4, 3) . ' = ' . $value['total_nominal'] . ' ' . $value['status_pembayaran'] ;
                                                            @endphp
                                                        </p>
                                                    @endforeach
                                                @else
                                                    Belum Ada Tagihan
                                                @endif
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
