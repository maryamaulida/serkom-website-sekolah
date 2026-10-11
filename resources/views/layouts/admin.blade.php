<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $profile->nama_sekolah }}</title>

    <link rel="shortcut icon"
          type="image/png"
          href="{{ asset('storage/' .$profile->logo) }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/styles.min.css') }}">

          <style>
                @media (min-width: 1200px) {
                    #headerCollapse {
                        display: none !important;
                    }


                }
                .content-area {
                    margin-top: 0;
                    position: relative;
                    z-index: 1;
                }
                #headerCollapse {
                    width: 38px;
                    height: 38px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.2s ease;
                }

                #headerCollapse:hover {
                    background-color: rgba(255, 255, 255, 0.15);
                    transform: scale(1.05);
                }

                #headerCollapse:active {
                    transform: scale(0.92);
                }

                #headerCollapse i {
                    font-size: 22px;
                }
        </style>
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
        <div class="app-topstrip bg-dark py-3 px-3 w-100 d-flex align-items-center justify-content-between">

        {{-- Toggle Sidebar --}}
        <a class="nav-link sidebartoggler nav-icon-hover text-white me-3"
        href="javascript:void(0)"
        id="headerCollapse">
            <i class="ti ti-menu-2"></i>
        </a>

        @php
            $profile = \App\Models\Profile::first();
        @endphp

        {{-- Logo --}}
        <div class="ms-auto d-flex align-items-center">
        <a href="{{ route('landing.index') }}" class="text-white d-flex align-items-center">

        @if($profile && $profile->logo)
            <img src="{{ asset('storage/' . $profile->logo) }}"
                alt="Logo Sekolah"
                width="34"
                height="34"
                class="me-2"
                style="object-fit: contain;">
        @else
            <img src="{{ asset('assets/images/logos/smanda.png') }}"
                alt="Logo Sekolah"
                width="32"
                height="32"
                class="me-2"
                style="object-fit: contain;">
        @endif

        {{-- Nama Sekolah --}}
        <span class="text-white fw-semibold">
            {{ $profile->nama_sekolah ?? 'SMAN 2 TASIKMALAYA' }}
        </span>

        </div>
        </a>
    </div>
        <!-- End App Topstrip -->


        <!-- Sidebar Start -->
        <aside class="left-sidebar">

            <!-- Sidebar scroll -->
            <div>

                <div class="brand-logo d-flex align-items-center justify-content-between">


                <a href="{{ route('landing.index') }}"
                class="text-nowrap logo-img d-flex align-items-center">

                    {{-- Logo Sekolah --}}
                    @if($profile && $profile->logo)

                        <img src="{{ asset('storage/' . $profile->logo) }}"
                            alt="{{ $profile->nama_sekolah ?? 'Logo Sekolah' }}"
                            width="45"
                            height="45"
                            style="object-fit: contain;">

                    @else

                        <img src="{{ asset('assets/images/logos/smanda.png') }}"
                            alt="Logo"
                            width="45"
                            height="45"
                            style="object-fit: contain;">

                    @endif


                    {{-- Nama Sekolah --}}
                    <span class="fw-semibold ms-2 text-dark">

                        {{ $profile->nama_sekolah ?? 'SMAN 2 TASIKMALAYA' }}

                    </span>

                </a>

            </div>
                <!-- End Logo -->


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

                <div class="container-fluid ">


                    <!-- Header Start -->
                    <header class="app-header">

                        <nav class="navbar navbar-expand-lg navbar-light">




                            <div class="navbar-collapse justify-content-end px-0">



                                <div class="text-black p-2 ">

                                    Selamat datang,
                                    {{ Auth::user()->name ?? 'User' }} 👋

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


                                                <!-- My Profile -->
                                                <a href="{{ route('my-profile') }}"
                                                   class="d-flex align-items-center gap-2 dropdown-item">

                                                    <i class="ti ti-user fs-6"></i>

                                                    <p class="mb-0 fs-3">
                                                        My Profile
                                                    </p>

                                                </a>


                                                <!-- Logout -->
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


                    <!-- Content -->
                    <div class="content-area">
                        @yield('content')
                    </div>
                    <!-- End Content -->


                    <!-- Footer -->
                    <div class="py-6 px-6 text-center">

                        <p class="mb-0 fs-4">

                            &copy; 2026 {{ $profile->nama_sekolah }}.
                            Hak Cipta Dilindungi Undang-Undang.

                        </p>

                    </div>
                    <!-- End Footer -->


                </div>

            </div>

        </div>
        <!-- End Main wrapper -->


    </div>
    <!-- End Body Wrapper -->


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
