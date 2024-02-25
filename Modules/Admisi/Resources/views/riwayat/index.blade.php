@extends('admisi::layouts.master')
@push('css')
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <div class="row invoice-info">
                            <div class="col-md-12 invoice-col">
                                <address class=" text-center">
                                    <h4><strong>UNIVERSITAS MUHAMMADIYAH JAMBI</strong></h4><br />
                                    Jl. Kapt. Pattimura, Simp. VI Sipin,
                                    Telanaipura, Kota Jambi, Jambi,
                                    Telepon: (0741) 60825,
                                    Email:
                                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="93fafdf5fcd3f2fffef2e0f2f6f6f7e0e7e6f7fafcbdf0fcfe">humas@umjambi.ac.id</a>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rincian</th>
                                            <th>Keterangan</th>
                                            <th class="text-right">Jumlah Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_nominal = 0;
                                        @endphp
                                        @foreach ($pembayaran as $item)
                                            <tr>
                                                <td class="col-md-1">{{ $loop->iteration }}</td>
                                                <td class="col-md-6">
                                                    @foreach (json_decode($item->rincian, true) as $key)
                                                        {{ $key['deskripsi'] }}
                                                    @endforeach
                                                </td>
                                                <td class="col-md-2">{{ strtolower($item->status_pembayaran) == 'terbayar' ? 'Sudah Bayar' : 'Belum Bayar' }}
                                                </td>
                                                <td class="col-md-3 text-right">
                                                    @foreach (json_decode($item->rincian, true) as $key)
                                                        {{ DataHelper::rupiah($key['nominal']) }}
                                                        @php
                                                            $total_nominal = $total_nominal + $key['nominal'];
                                                        @endphp
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="3" class="text-right">Total Bayar:</th>
                                            <td class="text-right">
                                                {!! DataHelper::rupiah($total_nominal) !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank"
                                    class="btn btn-sm btn-default float-right"><i class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-sm btn-primary float-right" style="margin-right: 5px">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
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
