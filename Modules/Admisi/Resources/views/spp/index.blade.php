@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="callout callout-danger">
                        <h5><i class="fas fa-info"></i> Perhatian:</h5>
                        Silahkan lakukan pembayaran pendaftaran terdahulu, untuk cara pembayaran silahkan klik link berikut
                    </div> --}}

                    <div class="invoice p-3 mb-3">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Dari
                                <address>
                                    <strong>Universitas Muhammadiyah Jambi</strong><br />
                                    Jl. Kapt. Pattimura, Simp. VI Sipin<br />
                                    Telanaipura, Kota Jambi, Jambi<br />
                                    Telepon: (0741) 60825<br />
                                    Email:
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="93fafdf5fcd3f2fffef2e0f2f6f6f7e0e7e6f7fafcbdf0fcfe">humas@umjambi.ac.id</a>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                Kepada
                                <address>
                                    <strong>{{ $biodata->nama_mahasiswa }}</strong><br />
                                    Handphone: {{ $biodata->hp }}<br />
                                    Email:
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="2d47424543034942486d48554c405d4148034e4240">{{ auth()->user()->email }}</a>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <b>Nomor Tagihan: {{ $cek_spp->nomor_pembayaran }}</b><br />
                                <br />
                                <b>Tanggal Berlaku:</b> {{ $cek_spp->waktu_berlaku }}<br />
                                <b>Tanggal Kadaluarsa:</b> {{ $cek_spp->waktu_kadaluarsa }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rincian</th>
                                            <th>Status</th>
                                            <th class="text-right">Jumlah Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-1">1</td>
                                            <td class="col-md-6">
                                                @foreach (json_decode($cek_spp->rincian) as $item)
                                                {{ $item->deskripsi }}
                                                @endforeach
                                            </td>
                                            <td class="col-md-2">{{ strtolower($cek_spp->status_pembayaran) == 'terbayar' ? 'Sudah Bayar' : 'Belum Bayar' }}</td>
                                            <td class="col-md-3 text-right">
                                                @foreach (json_decode($cek_spp->rincian) as $item)
                                                    {{ DataHelper::rupiah($item->nominal) }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Total Bayar:</th>
                                            <td class="text-right">
                                                @foreach (json_decode($cek_spp->rincian) as $item)
                                                    {{ DataHelper::rupiah($item->nominal) }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <p class="lead">Cara Pembayaran:</p>
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy
                                    zoodles, weebly ning heekya handango imeem plugg dopplr
                                    jibjab, movity jajah plickers sifteo edmodo ifttt
                                    zimbra.
                                </p>
                            </div>
                        </div>

                        <div class="row no-print">
                            <div class="col-12">
                                {{-- <a href="invoice-print.html" rel="noopener" target="_blank"
                                    class="btn btn-sm btn-default float-right"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-sm btn-primary float-right" style="margin-right: 5px">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button> --}}
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
