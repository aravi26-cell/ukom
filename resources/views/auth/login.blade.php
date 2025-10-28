<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('/') }}" />
    <title>@yield('title') {{ env('APP_NAME') }}</title>
    <meta charset="utf-8" />
    <meta name="token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css_plugins')
    <link href="{{ asset('assets_admin/plugins/custom/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets_admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_landing/css/landing.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('assets_admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <style>
        /* === Variabel Warna Tema (Hijau Mint dan Biru Laut) === */
        :root {
            --theme-green: #00BFA5;
            /* Hijau Mint/Teal Cerah - Warna Utama */
            --theme-blue: #01579B;
            /* Biru Laut/Navy - Warna Aksen/Profesional */
            --theme-gradient: linear-gradient(90deg, var(--theme-green), var(--theme-blue));
            --theme-bg-gradient: linear-gradient(135deg, #E0F2F1 0%, #E8F5E9 50%, #B2EBF2 100%);
        }

        /* === BODY BACKGROUND BARU (Lebih terang, bernuansa biru & hijau) === */
        body {
            background: var(--theme-bg-gradient);
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif !important;
            margin: 0;
        }

        [data-theme="dark"] body {
            background: linear-gradient(135deg, #1B1B1B 0%, #2C2C2C 40%, #1E1E1E 100%);
        }

        /* === HEADER TITLE BARU (Menggunakan gradient Hijau/Biru) === */
        .header-title {
            font-size: 28px;
            font-weight: 800;
            background: var(--theme-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .header-title:hover {
            transform: scale(1.03);
            opacity: 0.9;
        }

        @media (max-width: 576px) {
            .header-title {
                font-size: 20px;
            }
        }

        /* === CUSTOM THEME CLASSES === */
        .text-siap,
        .text-theme-primary {
            color: var(--theme-green) !important;
        }

        .text-theme-accent {
            color: var(--theme-blue) !important;
        }

        .bg-siap,
        .bg-theme-primary {
            background-color: var(--theme-green) !important;
        }

        /* === STICKY HEADER === */
        #kt_header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            /* Border-bottom menggunakan warna Hijau Primer (Green) */
            border-bottom: 1px solid rgba(0, 191, 165, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        }

        .scrolled #kt_header {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background: #fff;
        }


        /* === TOMBOL LOGIN / REGISTER (Menggunakan warna tema) === */
        .btn-outline.border-success {
            /* Menggunakan warna Hijau Primer (Green) sebagai border */
            border-color: var(--theme-green) !important;
            color: var(--theme-green) !important;
        }

        /* Hover menggunakan gradient Hijau/Biru */
        .btn-outline.border-success:hover,
        .hover-nusantara:hover {
            background: var(--theme-gradient) !important;
            color: #fff !important;
            border: none !important;
        }

        /* === PERBAIKAN Z-INDEX UNTUK AUTOCOMPLETE === */
        .ui-autocomplete {
            z-index: 1060 !important;
            max-height: 250px;
            overflow-y: auto;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
            /* Border menggunakan warna Aksen Biru */
            border: 2px solid var(--theme-blue);
            background-color: #fff;
        }

        .ui-state-active,
        .ui-menu-item:hover {
            /* Warna hover lembut (Biru muda) */
            background-color: #E0F7FA !important;
            border: none !important;
            margin: 0 !important;
        }

        /* === NAVIGASI DESKTOP HOVER === */
        @media (min-width: 992px) {
            .menu-state-primary .menu-item.here>.menu-link .menu-title {
                color: var(--theme-green);
                border-bottom: 2px solid var(--theme-green);
            }

            .header .header-menu .menu>.menu-item>.menu-link>.menu-title::after {
                background-color: var(--theme-green);
            }

            .header .header-menu .menu>.menu-item>.menu-link:hover>.menu-title {
                color: var(--theme-green) !important;
            }
        }

        /* === FOOTER ASPRAY (Menggunakan gradient Hijau/Biru) === */
        .footer-nusantara {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .footer-brand {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--theme-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
        }

        .footer-links a:hover {
            color: var(--theme-green);
            padding-left: 4px;
        }

        .footer-social:hover {
            background: var(--theme-green);
            color: #fff;
        }
    </style>
    @stack('styles')
</head>

<body id="kt_body" class="@yield('body-class')">

    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-column flex-column-fluid">

            {{-- HEADER CONTENT --}}
            <div id="kt_header" class="header border-bottom-0 shadow-sm">
                <div class="container-fluid d-flex align-items-center justify-content-between py-3">

                    {{-- === Logo / Brand (Warna teks disesuaikan) === --}}
                    <div class="d-flex align-items-center gap-3">
                        @if (count($current_side_menu ?? []) > 0)
                            <button class="btn btn-icon btn-active-icon-primary d-lg-none" id="kt_aside_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-2">
                                    <span class="path1"></span><span class="path2"></span>
                                </i>
                            </button>
                        @endif
                        <a href="{{ url('/customer/landing') }}" class="text-decoration-none">
                            <h1 class="header-title mb-0">Aspray <span class="text-theme-accent">Store</span></h1>
                            {{-- Menggunakan text-theme-accent (#01579B) untuk kata 'Store' --}}
                        </a>
                    </div>


                    {{-- === ACTIONS (Cart, Notification, Login/User) === --}}
                    <div class="d-flex align-items-center flex-shrink-0">

                        @guest
                            <a href="{{ route('login') }}"
                                class="btn btn-outline hover-nusantara border-success btn-sm fs-6 px-6 py-2"
                                style="border-width: 2px">
                                Login / Register
                            </a>
                        @endguest

                        @auth
                            @include('customer.layouts._cart')
                            @include('customer.layouts._notification')
                            @include('customer.layouts._user')
                        @endauth
                    </div>
                </div>
            </div>
            {{-- END HEADER CONTENT --}}

            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-stretch">
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @yield('content')

                    {{-- === FOOTER (Menggunakan tema warna baru) === --}}
                    <footer class="footer-nusantara mt-20">
                        <div class="container py-14">
                            <div class="row g-10 justify-content-between align-items-start">

                                <div class="col-lg-4 col-md-6 mb-10 mb-lg-0">
                                    <h1 class="footer-brand mb-4">Aspray</h1>
                                    <p class="text-gray-400 fs-6 pe-lg-10">
                                        Marketplace lokal dengan semangat Nusantara — menghubungkan penjual dan pembeli
                                        dari seluruh pelosok negeri.
                                    </p>
                                </div>

                                <div class="col-lg-2 col-md-4 mb-10 mb-lg-0">
                                    <h6 class="footer-heading">Jelajahi</h6>
                                    <ul class="footer-links">
                                        <li><a href="#">Tentang Kami</a></li>
                                        <li><a href="#">Karier</a></li>
                                        <li><a href="#">Kontak</a></li>
                                        <li><a href="#">Kebijakan Privasi</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-2 col-md-4 mb-10 mb-lg-0">
                                    <h6 class="footer-heading">Bantuan</h6>
                                    <ul class="footer-links">
                                        <li><a href="#">Pusat Bantuan</a></li>
                                        <li><a href="#">Pengembalian Barang</a></li>
                                        <li><a href="#">Syarat & Ketentuan</a></li>
                                        <li><a href="#">Kebijakan Penjual</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <h6 class="footer-heading">Ikuti Kami</h6>
                                    <div class="d-flex gap-3 mt-3">
                                        <a href="#" class="footer-social"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="footer-social"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="footer-social"><i
                                                class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="footer-bottom text-center mt-12 pt-6 border-top border-secondary">
                                <p class="text-gray-500 fs-7 mb-0">
                                    © {{ date('Y') }} <span class="text-theme-primary fw-semibold">Aspray Store</span> —
                                    {{-- Menggunakan text-theme-primary (#00BFA5) --}}
                                    Dibangun dengan semangat Nusantara 🇮🇩
                                </p>
                            </div>
                        </div>
                    </footer>


                </div>
            </div>
        </div>
    </div>

    {{-- MOBILE SEARCH MODAL --}}
    <div class="modal fade" id="mobileSearchModal" tabindex="-1" aria-labelledby="mobileSearchModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0 px-5">
                    <h3 class="fw-bold text-center text-theme-primary mb-6">Cari di Aspray Store</h3>
                    {{-- FORM PENCARIAN MOBILE --}}

                </div>
            </div>
        </div>
    </div>

    @stack('modals')

    <div id="error_log_display"></div>

    <script>
        const hostUrl = "{{ asset('assets') }}/";
        const baseUrl = "{{ url('/') }}";
    </script>
    <script src="{{ asset('assets_admin/plugins/global/plugins.bundle.js') }}"></script>
    @stack('js_plugins')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets_admin/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets_admin/plugins/custom/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets_admin/js/auto-numeric.js') }}"></script>
    <script src="{{ asset('assets_landing/js/landing.js') }}"></script>
    <script src="{{ asset('assets_admin/js/io.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        @if (session()->has('success'))
            swal.fire('{{ session('success') }}');
        @endif
        @if (session()->has('error'))
            Swal.fire({
                icon: "error",
                title: "{{ session('error') }}",
            });
        @endif

        // Efek scroll header
        document.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                document.body.classList.add('scrolled');
            } else {
                document.body.classList.remove('scrolled');
            }
        });

        // FUNGSI DINAMIS UNTUK MENGATUR PADDING BODY (Penting untuk sticky header)
        function updateBodyPadding() {
            const header = document.getElementById('kt_header');
            if (header) {
                // Mengambil tinggi header yang akurat
                document.body.style.paddingTop = header.getBoundingClientRect().height + 'px';
            }
        }

        // Jalankan fungsi saat load, resize, dan setelah sedikit delay
        window.addEventListener('load', updateBodyPadding);
        window.addEventListener('resize', updateBodyPadding);
        document.addEventListener('DOMContentLoaded', updateBodyPadding);
        setTimeout(updateBodyPadding, 100);
    </script>
    @stack('scripts')
</body>

</html>