@extends('layouts.header')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <div class="site-blocks-table">
                    @if ($penjualan)
                        <p align="right">Tanggal Pesan : {{ $penjualan->tanggal }}</p>
                    @else
                        <p align="right">Tidak ada pesanan.</p>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_penjualans as $detail_penjualan)
                                <tr>
                                    <td>
                                        <img src="{{ asset('image') }}/{{ $detail_penjualan->produk->image }}"
                                            width="100" alt="...">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $detail_penjualan->produk->nama }}</h2>
                                    </td>
                                    <td>Rp. {{ number_format($detail_penjualan->produk->harga) }}</td>
                                    <td>
                                        <!-- <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
                                            </div> -->
                                        <!-- Tambahkan id ke input -->
                                        <input type="number" class="form-control text-center quantity-amount"
                                            value="{{ $detail_penjualan->jumlah }}"
                                            data-harga="{{ $detail_penjualan->produk->harga }}"
                                            data-id="{{ $detail_penjualan->id }}" placeholder=""
                                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <!-- <div class="input-group-append">
                                                <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td id="total-harga-{{ $detail_penjualan->id }}">Rp.
                                        {{ number_format($detail_penjualan->jumlah_harga) }}</td>
                                    <td>
                                        <form action="{{ url('cart') }}/{{ $detail_penjualan->id }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin akan menghapus data ?');"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <!-- <div class="col-md-6 mb-3 mb-md-0">
                                <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                            </div> -->
                        <div class="col-md-6">
                            <a href="/shop" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>

                                <div class="col-md-6 text-right">
                                    @if ($penjualan)
                                        <strong id="total-keseluruhan" class="text-black">Rp.
                                            {{ number_format($penjualan->jumlah_harga) }}</strong>
                                    @else
                                        <strong id="total-keseluruhan" class="text-black">Rp. 0</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('konfirmasi-check-out') }}">
                                        <button class="btn btn-black btn-lg py-3 btn-block">Proceed To
                                            Checkout</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan semua elemen input jumlah
            var quantityInputs = document.querySelectorAll('.quantity-amount');

            // Menambahkan event listener pada setiap input jumlah
            quantityInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    var jumlah = parseInt(this.value);
                    var hargaSatuan = parseInt(this.getAttribute('data-harga'));
                    var totalHarga = jumlah * hargaSatuan;
                    var id = this.getAttribute('data-id');
                    // Perbarui total harga untuk produk tertentu
                    var jumlah = parseInt(this.value);
                    var id = this.getAttribute('data-id');
                    document.getElementById('total-harga-' + id).innerText = 'Rp. ' + totalHarga
                        .toLocaleString();

                    // Kirim permintaan Ajax untuk memperbarui jumlah
                    updateQuantity(id, jumlah);
                    // Hitung total keseluruhan
                    calculateTotal();
                });
            });

            function updateQuantity(id, jumlah) {
                $.ajax({
                    url: "{{ url('update-quantity') }}/" + id,
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        jumlah: jumlah
                    },
                    success: function(response) {
                        // Jika permintaan berhasil, lakukan sesuatu (opsional)
                        console.log('Jumlah barang diperbarui');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function calculateTotal() {
                var totalKeseluruhan = 0;
                var totalElements = document.querySelectorAll('[id^="total-harga-"]');

                totalElements.forEach(function(element) {
                    var harga = parseInt(element.innerText.replace('Rp. ', '').replace('.', '').replace('.',
                        ''));
                    totalKeseluruhan += harga;
                });

                // Perbarui total keseluruhan di HTML
                var formattedTotal = formatRupiah(totalKeseluruhan, 'Rp. ');
                document.getElementById('total-keseluruhan').innerText = formattedTotal;
            }

            // Fungsi untuk memformat angka menjadi format Rupiah
            function formatRupiah(angka, prefix) {
                var numberString = angka.toString().replace(/\D/g, '');
                var split = numberString.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    var separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
