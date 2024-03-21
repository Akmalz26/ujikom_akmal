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
              <h6>Data Penjualan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama Pembeli</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Jumlah Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Tanggal</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">action</th> --}}
                    </tr>
                  </thead>
                  <tbody id="table-penjualans">
                    @foreach($penjualans as $penjualan)
                    <tr id="index_{{ $penjualan->id }}">
                        <td  class="align-middle text-center text-sm">{{ $penjualan->user->name }}</td>
                        <td  class="align-middle text-center text-sm">Rp. {{ number_format ($penjualan->jumlah_harga) }}</td>
                        <td  class="align-middle text-center text-sm">{{ $penjualan->tanggal }}</td>
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
