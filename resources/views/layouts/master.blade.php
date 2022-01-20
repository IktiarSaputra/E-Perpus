<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                @if (auth()->user()->role == 1)
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="{{ route('dashboard.admin') }}" style="font-size: 20px !important; color: blue"><i
                                    style="font-size: 20px !important; color: blue" class="fas fa-book-reader"> </i> <b>
                                    E - Library</b></a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="{{ route('dashboard.admin') }}"><i style="font-size: 26px !important; color: blue"
                                    class="fas fa-book-reader"></i></a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Dashboard</li>
                            <li class="nav-item dropdown {{ Route::is('dashboard.admin') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('dashboard.admin') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('dashboard.admin') }}">General Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="menu-header">Navigasi</li>
                            <li
                                class="nav-item dropdown {{ Route::is('book.index') ? 'active' : '' }} {{ Route::is('location.index') ? 'active' : '' }} {{ Route::is('user.index') ? 'active' : '' }} {{ Route::is('pinjam-buku.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-columns"></i> <span>Data Master</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('location.index') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('location.index') }}">Lokasi</a></li>
                                    <li class="{{ Route::is('book.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('book.index') }}">Buku</a></li>
                                    <li class="{{ Route::is('pinjam-buku.index') ? 'active' : '' }}"><a class="nav-link"
                                                    href="{{ route('pinjam-buku.index') }}">Peminjam</a></li>
                                    <li class="{{ Route::is('user.index') ? 'active' : '' }}"><a class="nav-link"
                                                    href="{{ route('user.index') }}">User</a></li>
                                </ul>
                            </li>
                            {{-- <li class="menu-header">Navigasi</li>
                            <li
                                class="nav-item dropdown {{ Route::is('category.index') ? 'active' : '' }} {{ Route::is('product.index') ? 'active' : '' }}  {{ Route::is('suplier.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-columns"></i> <span>Data Master</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('category.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('category.index') }}">Kategori</a></li>
                                    <li class="{{ Route::is('suplier.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('suplier.index') }}">Supplier</a></li>
                                    <li class="{{ Route::is('product.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('product.index') }}">Produk</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown {{ Route::is('productOut.create') ? 'active' : '' }} {{ Route::is('productIn.index') ? 'active' : '' }} {{ Route::is('productOut.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i>
                                    <span>Transaksi</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('productIn.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('productIn.index') }}">Produk Masuk</a></li>
                                    <li class="{{ Route::is('productOut.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('productOut.index') }}">Produk Keluar</a></li>
                                    <li class="{{ Route::is('productOut.create') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('productOut.create') }}">Transaksi</a></li>
                                </ul>
                            </li>
                            <li
                                class="nav-item dropdown {{ Route::is('expense.index') ? 'active' : '' }} {{ Route::is('income.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice-dollar"></i></i>
                                    <span>Laporan</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('income.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('income.index') }}">Pemasukan</a></li>
                                    <li class="{{ Route::is('expense.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('expense.index') }}">Pengeluaran</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown {{ Route::is('profile') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User Setting</span></a>
                                <ul class="dropdown-menu">
                                <li class="{{ Route::is('profile') ? 'active' : '' }}"><a href="{{ route('profile') }}">Profile</a></li>
                                </ul>
                            </li> --}}
                        </ul>

                    </aside>
                @else
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="{{ route('home') }}" style="font-size: 20px !important; color: blue"><i
                                    style="font-size: 20px !important; color: blue" class="fas fa-book-reader"> </i> <b>
                                    E - Library</b></a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                            <a href="{{ route('home') }}"><i style="font-size: 26px !important; color: blue"
                                    class="fas fa-book-reader"></i></a>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Dashboard</li>
                            <li class="nav-item dropdown {{ Route::is('home') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-fire"></i><span>Dashboard</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('home') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('home') }}">General Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="menu-header">Navigasi</li>
                            <li class="nav-item dropdown {{ Route::is('list.buku') ? 'active' : '' }} {{ Route::is('list.pinjam') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-columns"></i> <span>Data Master</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('list.buku') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('list.buku') }}">List Buku</a></li>
                                    <li class="{{ Route::is('list.pinjam') ? 'active' : '' }}"><a class="nav-link"
                                                href="{{ route('list.pinjam') }}">Buku DiPinjam</a></li>
                                </ul>
                            </li>
                            {{-- <li class="menu-header">Navigasi</li>
                            <li
                                class="nav-item dropdown {{ Route::is('category.index') ? 'active' : '' }} {{ Route::is('product.index') ? 'active' : '' }}  {{ Route::is('suplier.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                        class="fas fa-columns"></i> <span>Data Master</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('category.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('category.index') }}">Kategori</a></li>
                                    <li class="{{ Route::is('suplier.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('suplier.index') }}">Supplier</a></li>
                                    <li class="{{ Route::is('product.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('product.index') }}">Produk</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown {{ Route::is('productOut.create') ? 'active' : '' }} {{ Route::is('productIn.index') ? 'active' : '' }} {{ Route::is('productOut.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-dollar-sign"></i>
                                    <span>Transaksi</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('productIn.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('productIn.index') }}">Produk Masuk</a></li>
                                    <li class="{{ Route::is('productOut.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('productOut.index') }}">Produk Keluar</a></li>
                                    <li class="{{ Route::is('productOut.create') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('productOut.create') }}">Transaksi</a></li>
                                </ul>
                            </li>
                            <li
                                class="nav-item dropdown {{ Route::is('expense.index') ? 'active' : '' }} {{ Route::is('income.index') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice-dollar"></i></i>
                                    <span>Laporan</span></a>
                                <ul class="dropdown-menu">
                                    <li class="{{ Route::is('income.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('income.index') }}">Pemasukan</a></li>
                                    <li class="{{ Route::is('expense.index') ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route('expense.index') }}">Pengeluaran</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown {{ Route::is('profile') ? 'active' : '' }}">
                                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User Setting</span></a>
                                <ul class="dropdown-menu">
                                <li class="{{ Route::is('profile') ? 'active' : '' }}"><a href="{{ route('profile') }}">Profile</a></li>
                                </ul>
                            </li> --}}
                        </ul>

                    </aside>
                @endif
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar </a> <div class="bullet"></div> Developed by <a href="#">Muhammad Ikctiar Saputra</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>

    <!-- Page Specific JS File -->

    @yield('js')
</body>

</html>
