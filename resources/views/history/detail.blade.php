@extends('layouts.header')
@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1></h1>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

    
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        {{-- <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div> --}}
        <div class="col-md-12 mt-2 mb-5">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>penjualan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($penjualan->kode+$penjualan->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h6><strong>{{ $penjualan->user->name }}</strong></h6>
                    <h6>location : {{ $penjualan->user->location }}</h6>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($penjualan))
                    <p align="right">Tanggal Pesan : {{ $penjualan->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama produk</th>
                                <th>Jumlah</th>
                                <th align="right">Harga</th>
                                <th align="right">Total Harga</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($detail_penjualans as $detail_penjualan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('image') }}/{{ $detail_penjualan->produk->image }}" width="100" alt="...">
                                </td>
                                <td>{{ $detail_penjualan->produk->nama }}</td>
                                <td>{{ $detail_penjualan->jumlah }}</td>
                                <td align="right">Rp. {{ number_format($detail_penjualan->produk->harga) }}</td>
                                <td align="right">Rp. {{ number_format($detail_penjualan->jumlah_harga) }}</td>
                                
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($penjualan->jumlah_harga) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($penjualan->kode) }}</strong></td>
                                
                            </tr>
                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($penjualan->kode+$penjualan->jumlah_harga) }}</strong></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection