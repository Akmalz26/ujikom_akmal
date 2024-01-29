@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="mb-3 px-3 nav-item d-flex align-self-end">
             <a href="javascript:void(0)"  class="btn btn-primary btn-xs active mb-0 text-white" id="btn-create-produk">
                 Add Produk
             </a>
         </div>
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Produk</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Gambar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Nama Produk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">stok</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">deskripsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">action</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">action</th> --}}
                    </tr>
                  </thead>
                  <tbody id="table-produks">
                    @foreach($produks as $produk)
                    <tr id="index_{{ $produk->id }}">
                        <td  class="align-middle text-center text-sm">
                        <img src="{{ asset('image/' . $produk->image) }}" class="img-fluid" width="150px">
                        </td>
                        <td  class="align-middle text-center text-sm">{{ $produk->nama }}</td>
                        <td  class="align-middle text-center text-sm">Rp. {{ number_format ($produk->harga) }}</td>
                        <td  class="align-middle text-center text-sm">{{ $produk->stok }}</td>
                        <td  class="align-middle text-center text-sm">{{ $produk->deskripsi }}</td>
                        {{-- <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-produk" data-id="{{ $produk->id }}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-produk" data-id="{{ $produk->id }}" class="btn btn-danger btn-sm">DELETE</a>
                        </td> --}}
                        <td class="text-center">
                          <a href="javascript:void(0)"  id="btn-edit-produk" data-id="{{ $produk->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                              <i class="fas fa-edit text-secondary"></i>
                          </a>
                          <span>
                            <a href="javascript:void(0)" id="btn-delete-produk" data-id="{{ $produk->id }}" data-bs-toggle="tooltip" data-bs-original-title="Detete">
                              <i class="cursor-pointer fas fa-trash text-secondary"></i>
                            </a>
                          </span>
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
  </main>
  @include('produk.create')
  @include('produk.edit')
  @include('produk.delete')
  
  @endsection
