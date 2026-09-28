<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SMAN 2 TASIKMALAYA</title>

    <link rel="shortcut icon"
          type="image/png"
          href="{{ asset('assets/images/logos/smanda.png') }}"  />

    <link rel="stylesheet"
          href="{{ asset('assets/css/styles.min.css') }}" />

</head>

<body>

    <!-- Body Wrapper -->

    <div class="page-wrapper"
         id="main-wrapper"
         data-layout="vertical"
         data-navbarbg="skin6"
         data-sidebartype="full"
         data-sidebar-position="fixed"
         data-header-position="fixed">


        <!-- App Topstrip -->

        <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">

                <div class="text-white p-2">
                    SMAN 2 TASIKMALAYA
                </div>

            </div>

        </div>


        <!-- Sidebar Start -->

        <aside class="left-sidebar">

            <!-- Sidebar scroll -->

            <div>

                <!-- Logo -->

                <div class="brand-logo d-flex align-items-center justify-content-between">

                    <a href="{{ route('admin.dashboard') }}"
                    class="text-nowrap logo-img d-flex align-items-center">

                        <img src="{{ asset('assets/images/logos/smanda.png') }}"
                            alt="Logo"
                            width="45"
                            height="45"
                            style="object-fit: contain;">

                        <span class="fw-semibold ms-2 text-dark ">
                            SMANDATAS OFFICIAL
                        </span>

                    </a>

                </div>


                <!-- Sidebar navigation -->

                <nav class="sidebar-nav scroll-sidebar"
                     data-simplebar="">

                    <ul id="sidebarnav">


                        <!-- ================================= -->
                        <!-- SEKOLAH -->
                        <!-- ================================= -->

                        <li class="nav-small-cap">

                            <iconify-icon
                                icon="solar:buildings-2-line-duotone"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                SEKOLAH
                            </span>

                        </li>


                        <!-- Dashboard -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.dashboard') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:widget-2-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Dashboard
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- Profile Sekolah -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.profile.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:buildings-2-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Profile Sekolah
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- Prestasi -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.prestasi.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:cup-star-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Prestasi Sekolah
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- ================================= -->
                        <!-- PEOPLE -->
                        <!-- ================================= -->

                        <li class="nav-small-cap mt-3">

                            <iconify-icon
                                icon="solar:users-group-rounded-line-duotone"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                PEOPLE
                            </span>

                        </li>


                        <!-- Guru -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.guru.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:users-group-rounded-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Guru Sekolah
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- Siswa -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.siswa.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:backpack-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Siswa Sekolah
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- ================================= -->
                        <!-- KESISWAAN -->
                        <!-- ================================= -->

                        <li class="nav-small-cap mt-3">

                            <iconify-icon
                                icon="solar:school-2-line-duotone"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                KESISWAAN
                            </span>

                        </li>


                        <!-- Ekstrakurikuler -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.ekskul.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:football-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Ekstrakurikuler
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- Pengumuman -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.pengumuman.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:bell-bing-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Pengumuman
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- ================================= -->
                        <!-- INFORMASI -->
                        <!-- ================================= -->

                        <li class="nav-small-cap mt-3">

                            <iconify-icon
                                icon="solar:document-text-line-duotone"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                INFORMASI
                            </span>

                        </li>


                        <!-- Berita -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.berita.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:document-text-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Berita Sekolah
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- Galeri -->

                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.galeri.index') }}"
                               aria-expanded="false">

                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:gallery-wide-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        Galeri Sekolah
                                    </span>

                                </div>

                            </a>

                        </li>


                        <!-- ================================= -->
                        <!-- MANAJEMEN -->
                        <!-- ================================= -->

                        @if(Auth::user()->role === 'Admin')
                        <li class="nav-small-cap mt-3">

                            <iconify-icon
                                icon="solar:settings-line-duotone"
                                class="nav-small-cap-icon fs-4">
                            </iconify-icon>

                            <span class="hide-menu">
                                MANAJEMEN
                            </span>

                        </li>


                        <!-- User -->
                        <li class="sidebar-item">

                            <a class="sidebar-link primary-hover-bg justify-content-between"
                               href="{{ route('admin.user.index') }}"
                               aria-expanded="false">
                                <div class="d-flex align-items-center gap-6">

                                    <span class="d-flex">

                                        <iconify-icon
                                            icon="solar:shield-user-line-duotone">
                                        </iconify-icon>

                                    </span>

                                    <span class="hide-menu">
                                        User
                                    </span>

                                </div>

                            </a>

                        </li>
                        @endif


                    </ul>

                </nav>

                <!-- End Sidebar navigation -->

            </div>

            <!-- End Sidebar scroll -->

        </aside>

        <!-- Sidebar End -->


        <!-- Main wrapper -->

        <div class="body-wrapper">

            <div class="body-wrapper-inner">

                <div class="container-fluid">


                    <!-- Header Start -->

                    <header class="app-header">

                        <nav class="navbar navbar-expand-lg navbar-light">

                            <div class="navbar-collapse justify-content-end px-0">

                                <div class="text-black p-2">

                                    <div class="text-black p-2">

                                    Selamat datang, {{ Auth::user()->name ?? 'User' }} 👋

                                </div>

                                </div>


                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                                    <li class="nav-item dropdown">

                                        <a class="nav-link"
                                        href="javascript:void(0)"
                                        id="drop2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">

                                            <div class="rounded-circle bg-light-primary d-flex align-items-center justify-content-center"
                                                style="width: 35px; height: 35px;">

                                                <i class="ti ti-user text-primary"></i>

                                            </div>

                                        </a>


                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">

                                            <div class="message-body">

                                                {{-- My Profile --}}
                                               <a href="{{ route('my-profile') }}"
                                                    class="d-flex align-items-center gap-2 dropdown-item">

                                                    <i class="ti ti-user fs-6"></i>

                                                    <p class="mb-0 fs-3">
                                                        My Profile
                                                    </p>

                                                </a>


                                                {{-- Logout --}}
                                                <form action="{{ route('logout') }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin logout?')">

                                                    @csrf

                                                    <button type="submit"
                                                            class="d-flex align-items-center gap-2 dropdown-item">

                                                        <i class="ti ti-logout fs-6"></i>

                                                        <p class="mb-0 fs-3">
                                                            Logout
                                                        </p>

                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </nav>

                    </header>

                    <!-- Header End -->


                    @yield('content')


                    <!-- Footer -->

                    <div class="py-6 px-6 text-center">

                        <p class="mb-0 fs-4">

                            Design and Developed by

                            <a href="https://www.wrappixel.com/"
                               target="_blank"
                               class="pe-1 text-primary text-decoration-underline">

                                wrappixel.com

                            </a>

                            Distributed by

                            <a href="https://themewagon.com/">

                                ThemeWagon

                            </a>

                        </p>

                    </div>


                </div>

            </div>

        </div>

    </div>


    <!-- Scripts -->

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    @stack('scripts')

</body>

</html>
