@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="mb-3 px-3 nav-item d-flex align-self-end">
         </div>
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data detailPenjualan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama Pembeli</th> 
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama Produk</th> 
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Harga 1 Produk</th> 
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jumlah Produk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Tanggal</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">action</th> --}}
                    </tr>
                  </thead>
                  <tbody id="table-detailPenjualans">
                    @foreach($detailPenjualans as $detailPenjualan)
                    <tr id="index_{{ $detailPenjualan->id }}">
                        <td  class="align-middle text-center text-sm">{{ $detailPenjualan->penjualan->user->name }}</td>
                        <td  class="align-middle text-center text-sm">{{ $detailPenjualan->produk->nama }}</td>
                        <td  class="align-middle text-center text-sm">Rp. {{ number_format ($detailPenjualan->produk->harga) }}</td>
                        <td  class="align-middle text-center text-sm">{{ $detailPenjualan->jumlah }}</td>
                        <td  class="align-middle text-center text-sm">Rp. {{ number_format ($detailPenjualan->jumlah_harga) }}</td>
                        <td  class="align-middle text-center text-sm">{{ $detailPenjualan->penjualan->tanggal }}</td>
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
  </main>
  @endsection
