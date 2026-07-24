<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $setting->store_name ?? 'Electronic Store' }}</title>

    <meta name="description"
        content="Toko Elektronik dan Furniture Terlengkap dengan Produk Berkualitas dan Harga Terbaik.">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

    <div class="bg-circle bg-1"></div>
    <div class="bg-circle bg-2"></div>

    <header class="navbar">

        <div class="container">

            <a href="/" class="logo">

                <div class="logo-icon">

                    <i class="fas fa-tv"></i>

                </div>

                <div>

                    <h2>{{ $setting->store_name }}</h2>

                    <span>{{ $setting->store_tagline }}</span>

                </div>

            </a>

            <nav>

                <a href="#home">Home</a>

                <a href="#categories">Kategori</a>

                <a href="#products">Produk</a>

                <a href="#best">Terlaris</a>

                <a href="/login" class="btn-login">

                    Login

                </a>

            </nav>

        </div>

    </header>



    <section class="hero" id="home">

        <div class="container hero-grid">

            <div class="hero-left">

                <span class="hero-badge">

                    ⭐ Produk Original • Garansi Resmi

                </span>

                {{-- <h1>
                    Elektronik & Furniture
                    <span>
                        Berkualitas
                    </span>
                    Untuk Rumah Anda.
                </h1> --}}
                <h1>
                    {{ $setting->hero_title }}
                </h1>

                <p>
                    {{ $setting->hero_subtitle }}
                </p>

                <div class="hero-action">

                    <a href="#products" class="btn-primary">

                        {{ $setting->hero_button ?? 'Belanja Sekarang' }}

                    </a>

                    <a href="#best" class="btn-outline">

                        Produk Terlaris

                    </a>

                </div>

                <div class="hero-feature">

                    <div>

                        <i class="fas fa-truck-fast"></i>

                        Pengiriman Cepat

                    </div>

                    <div>

                        <i class="fas fa-shield-halved"></i>

                        Garansi Resmi

                    </div>

                    <div>

                        <i class="fas fa-credit-card"></i>

                        Pembayaran Mudah

                    </div>

                </div>

            </div>



            <div class="hero-right">

                <div class="dashboard-card">

                    <h3>

                        Statistik Toko

                    </h3>

                    <div class="dashboard-grid">

                        <div>

                            <h2>

                                {{ $sliderProducts->count() }}

                            </h2>

                            <span>

                                Produk

                            </span>

                        </div>

                        <div>

                            <h2>

                                {{ $categories->count() }}

                            </h2>

                            <span>

                                Kategori

                            </span>

                        </div>

                        <div>

                            <h2>

                                {{ number_format($topProducts->sum('total_qty')) }}

                            </h2>

                            <span>

                                Unit Terjual

                            </span>

                        </div>

                        <div>

                            <h2>

                                {{ $topProducts->count() }}

                            </h2>

                            <span>

                                Best Seller

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="promo">

        <div class="container">

            <div class="promo-box">

                <div>

                    <span>

                        PROMO SPESIAL

                    </span>

                    <h2>

                        Diskon Hingga 25%

                    </h2>

                    <p>

                        Berlaku untuk produk pilihan selama persediaan masih ada.

                    </p>

                </div>

                <a href="#products" class="btn-primary">

                    Lihat Promo

                </a>

            </div>

        </div>

    </section>



    <section id="categories" class="categories">

        <div class="container">

            <div class="section-title">

                <span>

                    KATEGORI

                </span>

                <h2>

                    Belanja Berdasarkan Kategori

                </h2>

            </div>

            <div class="category-grid">

                @foreach ($categories as $category)
                    <div class="category-card">

                        <i class="fas fa-box-open"></i>

                        <h4>

                            {{ $category->name }}

                        </h4>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
    <!-- =======================================================
        FEATURED PRODUCTS
======================================================== -->

    <section class="featured-products">

        <div class="container">

            <div class="section-title">

                <span>

                    PRODUK UNGGULAN

                </span>

                <h2>

                    Pilihan Terbaik Untuk Anda

                </h2>

                <p>

                    Produk elektronik dan furniture pilihan dengan kualitas terbaik.

                </p>

            </div>

            <div class="featured-slider">

                @foreach ($sliderProducts as $product)
                    <div class="featured-card">

                        <div class="featured-image">

                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="https://placehold.co/600x600/F3F4F6/6B7280?text=No+Image" alt="No Image">
                            @endif

                            @if ($product->is_favorite)
                                <span class="favorite-tag">

                                    <i class="fas fa-star"></i>

                                    Favorite

                                </span>
                            @endif

                        </div>

                        <div class="featured-content">

                            <h3>

                                {{ $product->name }}

                            </h3>

                            <h4>

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </h4>

                            <a href="#products" class="btn-primary">

                                Lihat Produk

                            </a>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>



    <!-- =======================================================
        ALL PRODUCTS
======================================================== -->

    <section id="products" class="products">

        <div class="container">

            <div class="section-title">

                <span>

                    PRODUK

                </span>

                <h2>

                    Semua Produk

                </h2>

                <p>

                    Jelajahi seluruh produk elektronik dan furniture.

                </p>

            </div>


            <div class="filter-category">

                <button class="filter-btn active" data-category="all">

                    Semua

                </button>

                @foreach ($categories as $category)
                    <button class="filter-btn" data-category="{{ $category->id }}">

                        {{ $category->name }}

                    </button>
                @endforeach

            </div>



            <div class="product-grid">

                @foreach ($menuProducts as $product)
                    <div class="product-card" data-category="{{ $product->category_id }}">

                        <div class="product-image">

                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="https://placehold.co/600x600/F3F4F6/6B7280?text=No+Image" alt="No Image">
                            @endif

                            @if ($product->status)
                                <span class="stock ready">

                                    Tersedia

                                </span>
                            @else
                                <span class="stock empty">

                                    Habis

                                </span>
                            @endif

                        </div>

                        <div class="product-body">

                            <h3>

                                {{ $product->name }}

                            </h3>

                            <p>

                                {{ \Illuminate\Support\Str::limit($product->description, 80) }}

                            </p>

                            <div class="product-price">

                                Rp {{ number_format($product->price, 0, ',', '.') }}

                            </div>

                            <div class="product-footer">

                                @if ($product->is_favorite)
                                    <span class="favorite-label">

                                        <i class="fas fa-heart"></i>

                                        Favorite

                                    </span>
                                @endif

                                <button class="btn-product btn-detail" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="{{ number_format($product->price, 0, ',', '.') }}"
                                    data-category="{{ $product->category->name ?? '-' }}"
                                    data-stock="{{ $product->stock }}"
                                    data-description="{{ $product->description }}"
                                    data-image="{{ $product->image ? asset($product->image) : 'https://placehold.co/600x600?text=No+Image' }}">
                                    Detail
                                </button>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>



    <!-- =======================================================
        WHY CHOOSE US
======================================================== -->

    <section class="why-us">

        <div class="container">

            <div class="section-title">

                <span>

                    KEUNGGULAN

                </span>

                <h2>

                    Kenapa Memilih Kami?

                </h2>

            </div>

            <div class="why-grid">

                <div class="why-card">

                    <i class="fas fa-truck-fast"></i>

                    <h3>

                        Pengiriman Cepat

                    </h3>

                    <p>

                        Pengiriman ke seluruh wilayah di bumi dengan proses yang cepat, secepat kilat.

                    </p>

                </div>

                <div class="why-card">

                    <i class="fas fa-medal"></i>

                    <h3>

                        Produk Original

                    </h3>

                    <p>

                        Semua produk dijamin original dan bergaransi resmi.

                    </p>

                </div>

                <div class="why-card">

                    <i class="fas fa-credit-card"></i>

                    <h3>

                        Pembayaran Mudah

                    </h3>

                    <p>

                        Mendukung berbagai metode pembayaran.

                    </p>

                </div>

                <div class="why-card">

                    <i class="fas fa-headset"></i>

                    <h3>

                        Support

                    </h3>

                    <p>

                        Tim kami siap membantu kebutuhan Anda setiap hari.

                    </p>

                </div>

            </div>

        </div>

    </section>
    <!-- =======================================================
        TOP SELLING
======================================================== -->

    <section id="best" class="best-selling">

        <div class="container">

            <div class="section-title">

                <span>

                    BEST SELLER

                </span>

                <h2>

                    Produk Terlaris

                </h2>

                <p>

                    Produk paling banyak terjual dalam

                    <strong>{{ $range }}</strong>

                    hari terakhir.

                </p>

            </div>

            <div class="range-filter">

                <a href="{{ route('landing', ['range' => 7]) }}" class="{{ $range == 7 ? 'active' : '' }}">

                    7 Hari

                </a>

                <a href="{{ route('landing', ['range' => 30]) }}" class="{{ $range == 30 ? 'active' : '' }}">

                    30 Hari

                </a>

                <a href="{{ route('landing', ['range' => 90]) }}" class="{{ $range == 90 ? 'active' : '' }}">

                    90 Hari

                </a>

            </div>

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th width="80">

                                Rank

                            </th>

                            <th>

                                Nama Produk

                            </th>

                            <th width="170">

                                Harga

                            </th>

                            <th width="150">

                                Terjual

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($topProducts as $index=>$product)
                            <tr>

                                <td>

                                    @switch($index)
                                        @case(0)
                                            🥇
                                        @break

                                        @case(1)
                                            🥈
                                        @break

                                        @case(2)
                                            🥉
                                        @break

                                        @default
                                            {{ $index + 1 }}
                                    @endswitch

                                </td>

                                <td>

                                    <div class="top-product-name">

                                        {{ $product->name }}

                                        @if (in_array($product->id, $topProductIds))
                                            <span class="badge-top">

                                                TOP

                                            </span>
                                        @endif

                                    </div>

                                </td>

                                <td>

                                    Rp {{ number_format($product->unit_price, 0, ',', '.') }}

                                </td>

                                <td>

                                    <strong>

                                        {{ number_format($product->total_qty) }}

                                    </strong>

                                </td>

                            </tr>

                            @empty

                                <tr>

                                    <td colspan="4" style="text-align:center;padding:50px">

                                        Belum ada data penjualan.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </section>



        <!-- =======================================================
                                                STORE STATISTIC
                                        ======================================================== -->

        <section class="statistics">

            <div class="container">

                <div class="stats-grid">

                    <div class="stat-card">

                        <i class="fas fa-box"></i>

                        <h2>

                            {{ $sliderProducts->count() }}

                        </h2>

                        <span>

                            Produk

                        </span>

                    </div>

                    <div class="stat-card">

                        <i class="fas fa-layer-group"></i>

                        <h2>

                            {{ $categories->count() }}

                        </h2>

                        <span>

                            Kategori

                        </span>

                    </div>

                    <div class="stat-card">

                        <i class="fas fa-fire"></i>

                        <h2>

                            {{ number_format($topProducts->sum('total_qty')) }}

                        </h2>

                        <span>

                            Unit Terjual

                        </span>

                    </div>

                    <div class="stat-card">

                        <i class="fas fa-award"></i>

                        <h2>

                            {{ $topProducts->count() }}

                        </h2>

                        <span>

                            Best Seller

                        </span>

                    </div>

                </div>

            </div>

        </section>



        <!-- =======================================================
                                                CTA
                                        ======================================================== -->

        <section class="cta">

            <div class="container">

                <div class="cta-box">

                    <h2>

                        Temukan Produk Terbaik Untuk Rumah Anda

                    </h2>

                    <p>

                        Dapatkan elektronik,
                        furniture,
                        dan perlengkapan rumah tangga
                        dengan kualitas terbaik
                        serta harga yang kompetitif.

                    </p>

                    <a href="#products" class="btn-primary">

                        Mulai Belanja

                    </a>

                </div>

            </div>

        </section>



        <!-- =======================================================
                                                FOOTER
                                        ======================================================== -->

        <footer>

            <div class="container">

                <div class="footer-grid">

                    <div>

                        <h3>

                            {{ $setting->store_name }}

                        </h3>


                        <p>
                            {{ $setting->store_description }}
                        </p>

                    </div>

                    <div>

                        <h4>

                            Menu

                        </h4>

                        <ul>

                            <li><a href="#home">Home</a></li>

                            <li><a href="#categories">Kategori</a></li>

                            <li><a href="#products">Produk</a></li>

                            <li><a href="#best">Terlaris</a></li>

                        </ul>

                    </div>

                    <div>

                        <h4>

                            Kontak

                        </h4>

                        <ul>

                            <li>

                                <i class="fas fa-location-dot"></i>
                                {{ $setting->address }}

                            </li>

                            <li>

                                <i class="fas fa-phone"></i>
                                {{ $setting->phone }}

                            </li>

                            <li>

                                <i class="fas fa-envelope"></i>
                                {{ $setting->email }}

                            </li>

                        </ul>

                    </div>

                    <div>

                        <h4>

                            Ikuti Kami

                        </h4>

                        <div class="social">

                            <a href="{{ $setting->facebook }}">

                                <i class="fab fa-facebook-f"></i>

                            </a>

                            <a href="{{ $setting->instagram }}">

                                <i class="fab fa-instagram"></i>

                            </a>

                            <a href="{{ $setting->tiktok }}">

                                <i class="fab fa-tiktok"></i>

                            </a>

                            <a href="{{ $setting->youtube }}">

                                <i class="fab fa-youtube"></i>

                            </a>

                        </div>

                    </div>

                </div>

                <div class="copyright">
                    {{ $setting->copyright ?? '© ' . date('Y') . ' ' . $setting->store_name }}
                    {{--
                    {{ $settings['copyright'] ?? '© ' . date('Y') . ' ' . $settings['store_name'] }} --}}

                </div>

            </div>

        </footer>



        <button class="back-to-top" id="backTop">

            <i class="fas fa-arrow-up"></i>

        </button>



        <a href="https://wa.me/{{ $setting->whatsapp ?? '' }}" target="_blank" class="floating-wa">

            <i class="fab fa-whatsapp"></i>

        </a>


        {{-- =========================
    PRODUCT DETAIL MODAL
========================= --}}
        <div class="product-modal" id="productModal">

            <div class="modal-content">

                <button class="modal-close">
                    <i class="fas fa-times"></i>
                </button>

                <div class="modal-grid">

                    <div class="modal-image">

                        <img id="modalImage" alt="Product">

                    </div>

                    <div class="modal-info">

                        <div class="modal-badges">

                            <span class="badge-category">
                                <i class="fas fa-tag"></i>
                                <span id="modalCategory"></span>
                            </span>

                            <span class="badge-stock">

                                <i class="fas fa-box"></i>

                                Stok :
                                <span id="modalStock"></span>

                            </span>

                        </div>

                        <h2 class="modal-title" id="modalName"></h2>

                        <div class="modal-price" id="modalPrice"></div>

                        <div class="modal-description">

                            <h4>Deskripsi Produk</h4>

                            <p id="modalDescription"></p>

                        </div>

                        <div class="modal-features">

                            <div>
                                <i class="fas fa-circle-check"></i>
                                Produk Original
                            </div>

                            <div>
                                <i class="fas fa-shield-halved"></i>
                                Garansi Resmi
                            </div>

                            <div>
                                <i class="fas fa-truck-fast"></i>
                                Pengiriman Cepat
                            </div>

                            <div>
                                <i class="fas fa-headset"></i>
                                Konsultasi Gratis
                            </div>

                        </div>

                        <div class="modal-action">

                            <a id="modalWhatsapp" target="_blank" class="btn-whatsapp">

                                <i class="fab fa-whatsapp"></i>

                                Chat via WhatsApp

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script>
            const filterButtons = document.querySelectorAll(".filter-btn");

            const productCards = document.querySelectorAll(".product-card");

            filterButtons.forEach(button => {

                button.addEventListener("click", () => {

                    filterButtons.forEach(btn => btn.classList.remove("active"));

                    button.classList.add("active");

                    const category = button.dataset.category;

                    productCards.forEach(card => {

                        if (category === "all") {

                            card.style.display = "block";

                            return;

                        }

                        card.style.display =
                            card.dataset.category === category ?
                            "block" :
                            "none";

                    });

                });

            });



            const backTop = document.getElementById("backTop");

            window.addEventListener("scroll", () => {

                backTop.classList.toggle(
                    "show",
                    window.scrollY > 400
                );

            });

            backTop.onclick = () => {

                window.scrollTo({

                    top: 0,

                    behavior: "smooth"

                });

            };



            const observer = new IntersectionObserver(entries => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add("show");

                    }

                });

            });

            document.querySelectorAll("section,.product-card,.featured-card,.why-card,.stat-card").forEach(el => {

                observer.observe(el);

            });

            // modal detail

            const modal = document.getElementById("productModal");

            document.querySelectorAll(".btn-detail").forEach(btn => {

                btn.onclick = () => {

                    document.getElementById("modalName").innerText =
                        btn.dataset.name;

                    document.getElementById("modalPrice").innerText =
                        "Rp " + btn.dataset.price;

                    document.getElementById("modalCategory").innerText =
                        btn.dataset.category;

                    document.getElementById("modalStock").innerText =
                        btn.dataset.stock;

                    document.getElementById("modalDescription").innerText =
                        btn.dataset.description;

                    document.getElementById("modalImage").src =
                        btn.dataset.image;

                    document.getElementById("modalWhatsapp").href =
                        "https://wa.me/{{ $setting->whatsapp }}?text=Saya tertarik dengan produk " + btn.dataset
                        .name;

                    modal.classList.add("show");

                }

            });

            document.querySelector(".modal-close").onclick = () => {

                modal.classList.remove("show");

            };

            modal.onclick = (e) => {

                if (e.target === modal) {

                    modal.classList.remove("show");

                }

            };
        </script>



    </body>

    </html>
