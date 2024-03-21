<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="frontend/css/tiny-slider.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li><a class="nav-link" href="/shop">Shop</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="profile"><img src="images/user.svg"></a></li>
                    <li><a class="nav-link" href="cart"><img src="images/cart.svg"></a></li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

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
                    @if($penjualan)
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
                            @foreach($detail_penjualans as $detail_penjualan)
                            <tr>
                                <td>
                                    <img src="{{ asset('image') }}/{{ $detail_penjualan->produk->image }}" width="100" alt="...">
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
                                    <input type="number" class="form-control text-center quantity-amount" value="{{ $detail_penjualan->jumlah }}" data-harga="{{ $detail_penjualan->produk->harga }}" data-id="{{ $detail_penjualan->id }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <!-- <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div> -->
                                </td>
                                <td id="total-harga-{{ $detail_penjualan->id }}">Rp. {{ number_format($detail_penjualan->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('cart') }}/{{ $detail_penjualan->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
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
                                <!-- <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">$230.00</strong>
                                </div> -->
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>

                                <div class="col-md-6 text-right">
                                    @if($penjualan)
                                    <strong id="total-keseluruhan" class="text-black">Rp. {{ number_format($penjualan->jumlah_harga) }}</strong>
                                    @else
                                    <strong id="total-keseluruhan" class="text-black">Rp. 0</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('konfirmasi-check-out') }}">
                                        <button class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">
            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                    <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge base</a></li>
                                <li><a href="#">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Leadership</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Nordic Chair</a></li>
                                <li><a href="#">Kruzo Aero</a></li>
                                <li><a href="#">Ergonomic Chair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->



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
                    document.getElementById('total-harga-' + id).innerText = 'Rp. ' + totalHarga.toLocaleString();

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
                    var harga = parseInt(element.innerText.replace('Rp. ', '').replace(',', '').replace(',', ''));
                    totalKeseluruhan += harga;
                });

                // Perbarui total keseluruhan di HTML
                document.getElementById('total-keseluruhan').innerText = 'Rp. ' + totalKeseluruhan.toLocaleString();
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="frontend/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/js/tiny-slider.js"></script>
    <script src="frontend/js/custom.js"></script>
</body>

</html>