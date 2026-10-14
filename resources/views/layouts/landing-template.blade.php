<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profile ? $profile->nama_sekolah : 'smpn one psp'}}</title>
    <link rel="shortcut icon"
          type="image/png"
          href="{{ asset('storage/' .$profile->logo) }}">


    {{-- Bootstrap / Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}">

    {{-- Landing CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    {{-- AOS CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/aos-master/dist/aos.css') }}">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/swiper/swiper-bundle.min.css') }}">


</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

        <div class="container">

            {{-- Logo --}}
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <img src="{{ asset('storage/' .$profile->logo) }}"
                    width="40"
                    height="40"
                    alt="Logo"
                    style="object-fit: cover;">

                <span class="fw-bold">
                    {{ $profile->nama_sekolah }}
                </span>
            </a>


            {{-- Tombol Hamburger --}}
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                >

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- Menu Navbar --}}
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    {{-- Beranda --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.index') ? 'active' : '' }}"
                            href="{{ route('landing.index') }}">
                            Beranda
                        </a>
                    </li>


                    {{-- Profil --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.profile') ? 'active' : '' }}"
                         href="{{ route('landing.profile') }}">
                            Profil
                        </a>
                    </li>


                    {{-- Berita --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.berita.*') ? 'active' : '' }}"
                         href="{{ route('landing.berita.index') }}">
                            Berita
                        </a>
                    </li>


                    {{-- Guru --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.guru.*') ? 'active' : '' }}"
                         href="{{ route('landing.guru.index') }}">
                            Guru
                        </a>
                    </li>


                    {{-- Prestasi --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.prestasi.*') ? 'active' : '' }}"
                         href="{{ route('landing.prestasi.index') }}">
                            Prestasi
                        </a>
                    </li>


                    {{-- Galeri --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.galeri.*') ? 'active' : '' }}"
                         href="{{ route('landing.galeri.index') }}">
                            Galeri
                        </a>
                    </li>



                    {{-- Informasi --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            Informasi

                        </a>


                        {{-- Isi Dropdown --}}
                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('landing.pengumuman.*') ? 'active' : '' }}"
                                 href="{{ route('landing.pengumuman.index') }}">
                                    Pengumuman
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item {{ request()->routeIs('landing.eskul.*') ? 'active' : '' }}"
                                 href="{{ route('landing.eskul.index') }}">
                                    Ekstrakurikuler
                                </a>
                            </li>

                        </ul>

                    </li>

                    <a href="{{ route('auth.login') }}" class="btn btn-primary text-white ms-2 px-3 py-2">
                    Login
                    </a>

                    {{-- Barang --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing.nilai') ? 'active' : '' }}"
                         href="{{ route('landing.nilai') }}">
                            Ujikom
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    {{-- Isi halaman --}}
    @yield('content')


    {{-- Footer --}}
    <footer class="bg-dark text-white">

        <div class="container py-5">

            <div class="row">

                <div class="col-md-4 mb-4">

                    <div class="d-flex align-items-center gap-3">

                        <img src="{{ asset('storage/' .$profile->logo) }}"
                            class="footer-image"
                            alt="Logo">

                        <div>

                            <h5 class="fw-bold mb-1">
                                {{ $profile->nama_sekolah }}
                            </h5>

                            <p class="text-secondary mb-0 small">
                                Sekolah Unggul dan Berprestasi
                            </p>

                        </div>

                    </div>

                    <p class="text-footer text-secondary mt-3">
                        {{ $profile->deskripsi }}
                    </p>

                </div>


                <div class="col-md-4 mb-4">

                    <h6 class="fw-bold mb-3">
                        Menu Cepat
                    </h6>

                    <ul class="list-unstyled ul-text">

                        <li class="mb-2">
                            <a href="{{ route('landing.index') }}" class="text-secondary">
                                Beranda
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('landing.prestasi.index') }}" class="text-secondary">
                                Profil Sekolah
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('landing.berita.index') }}" class="text-secondary">
                                Berita
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('landing.guru.index') }}" class="text-secondary">
                                Guru & Staf
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="{{ route('landing.prestasi.index') }}" class="text-secondary">
                                Prestasi
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('landing.galeri.index') }}" class="text-secondary">
                                Galeri
                            </a>
                        </li>

                    </ul>

                </div>


                <div class="col-md-4 mb-4">

                    <h6 class="fw-bold mb-3">
                        Informasi Sekolah
                    </h6>

                    <p class="text-secondary ul-text mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        {{ $profile->alamat }}
                    </p>

                </div>

            </div>

        </div>


        <div class="text-center py-3 border-top border-secondary">

            <p class="text-secondary mb-0 text-foot">
                &copy; 2026 {{ $profile->nama_sekolah }}.
                Hak Cipta Dilindungi Undang-Undang.
            </p>

        </div>

    </footer>


    {{-- Bootstrap JS --}}
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- AOS JS --}}
    <script src="{{ asset('assets/aos-master/dist/aos.js') }}"></script>

    {{-- AOS Initialize --}}
    <script>
        AOS.init();
    </script>

    {{-- Swiper JS --}}
    <script src="{{ asset('assets/swiper/swiper-bundle.min.js') }}"></script>
    <script>
        document.querySelectorAll(
            '.guruSwiper, .prestasiSwiper, .eskulSwiper, .galeriSwiper'
        ).forEach(function (element) {
            const isGuru = element.classList.contains('guruSwiper');
            const jumlah = isGuru ? 4 : 3;

            new Swiper(element, {
                slidesPerView: 1,
                slidesPerGroup: 1,
                spaceBetween: 24,

                pagination: {
                    el: element.querySelector('.swiper-pagination'),
                    clickable: true,
                },

                breakpoints: {
                    576: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                    },
                    992: {
                        slidesPerView: jumlah,
                        slidesPerGroup: jumlah,
                    },
                },
            });
        });
    </script>

</body>

</html>
