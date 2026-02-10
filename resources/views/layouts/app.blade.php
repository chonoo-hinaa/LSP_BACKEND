<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Sistem LSP') }} - @yield('title')</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar .nav-link {
            color: #adb5bd;
            padding: 0.75rem 1rem;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background: #495057;
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div id="app">
        @auth
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-2 d-md-block sidebar p-0">
                    <div class="position-sticky pt-3">
                        <div class="text-center mb-4">
                            <h5 class="text-white">Sistem LSP</h5>
                            <small class="text-muted">Admin Panel</small>
                        </div>
                        
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard
                                </a>
                            </li>
                            
                            <li class="nav-item mt-3">
                                <small class="text-muted px-3">REFERENSI</small>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('asesor*') ? 'active' : '' }}" href="{{ route('asesor.index') }}">
                                    <i class="bi bi-people"></i> Data Asesor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('asesi*') ? 'active' : '' }}" href="{{ route('asesi.index') }}">
                                    <i class="bi bi-person-badge"></i> Data Asesi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('tuk*') ? 'active' : '' }}" href="{{ route('tuk.index') }}">
                                    <i class="bi bi-geo-alt"></i> Data TUK
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('skema*') ? 'active' : '' }}" href="{{ route('skema.index') }}">
                                    <i class="bi bi-file-text"></i> Data Skema
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                    <i class="bi bi-person-gear"></i> Data Pengguna
                                </a>
                            </li>
                            
                            <li class="nav-item mt-3">
                                <small class="text-muted px-3">UJI KOMPETENSI</small>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('jadwal-ujikom*') ? 'active' : '' }}" href="{{ route('jadwal-ujikom.index') }}">
                                    <i class="bi bi-calendar-event"></i> Jadwal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('permohonan*') ? 'active' : '' }}" href="{{ route('permohonan.index') }}">
                                    <i class="bi bi-file-earmark-check"></i> Permohonan
                                </a>
                            </li>
                            
                            <li class="nav-item mt-3">
                                <small class="text-muted px-3">PENGATURAN</small>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('tahun-aktif*') ? 'active' : '' }}" href="{{ route('tahun-aktif.index') }}">
                                    <i class="bi bi-calendar3"></i> Tahun Aktif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('kop-surat*') ? 'active' : '' }}" href="{{ route('kop-surat.index') }}">
                                    <i class="bi bi-envelope"></i> Kop Surat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('asesor-skema*') ? 'active' : '' }}" href="{{ route('asesor-skema.index') }}">
                                    <i class="bi bi-diagram-3"></i> Asesor Skema
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person-circle"></i> Profile
                                </a>
                            </li>
                        </ul>
                        
                        <div class="px-3 mt-4">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
                
                <!-- Main Content -->
                <main class="col-md-10 ms-sm-auto px-md-4">
                    <!-- Navbar -->
                    <nav class="navbar navbar-light bg-light mt-3 mb-4 rounded">
                        <div class="container-fluid">
                            <span class="navbar-brand mb-0 h1">@yield('title')</span>
                            <div class="d-flex align-items-center">
                                <span class="me-3">{{ auth()->user()->name }}</span>
                                <span class="badge bg-primary">{{ ucfirst(auth()->user()->role) }}</span>
                            </div>
                        </div>
                    </nav>
                    
                    <!-- Alert Messages -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <!-- Page Content -->
                    @yield('content')
                </main>
            </div>
        </div>
        @else
        @yield('content')
        @endauth
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>