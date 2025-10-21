<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo Vazse - Gestión Documental</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

       
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, rgba(7, 1, 51, 1), rgba(5, 1, 54, 1) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }

        .sidebar-logo {
            padding: 0;
        }

        .logo-header {
            background: rgba(0,0,0,0.2);
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .logo {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo img {
            height: 40px;
            border-radius: 4px;
        }

        .logo p {
            margin: 0;
            font-weight: 600;
            font-size: 18px;
            color: white;
        }

        .nav-toggle {
            display: none; 
        }

        .sidebar-wrapper {
            height: calc(100vh - 80px);
            overflow-y: auto;
        }

        .sidebar-content {
            padding: 20px 0;
        }

        .nav.nav-secondary {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin: 0;
        }

        .nav-item a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-item a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: #2ecc71;
        }

        .nav-item.active a {
            background: rgba(255,255,255,0.15);
            color: white;
            border-left-color: #2ecc71;
            font-weight: 600;
        }

        .nav-item a i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .nav-item a p {
            margin: 0;
            flex: 1;
        }

      
        .main-panel {
            flex: 1;
            margin-left: 250px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

      
        .main-header {
            background: white;
            box-shadow: 0 1px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar-header {
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar-header h3 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .navbar-header h6 {
            color: #7f8c8d;
            font-weight: 400;
        }

       
        .topbar-user .profile-pic {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #2c3e50;
            padding: 5px 15px;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .topbar-user .profile-pic:hover {
            background: #f8f9fa;
        }

        .avatar-sm {
            width: 32px;
            height: 32px;
        }

        .avatar-sm img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-username {
            margin-left: 10px;
        }

        .profile-username .op-7 {
            opacity: 0.7;
            font-size: 12px;
        }

        .profile-username .fw-bold {
            font-size: 14px;
        }

        
        .container {
            flex: 1;
            padding: 30px;
        }

    
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #e0e0e0;
            padding: 20px;
            border-radius: 10px 10px 0 0 !important;
        }

        
        .footer {
            background: white;
            padding: 20px 0;
            margin-top: auto;
            border-top: 1px solid #e0e0e0;
        }

        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .main-panel {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        
        <div class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a href="{{ route('documentos.index') }}" class="logo">
                        <img src="{{ asset('assets/img/logo2.png') }}" alt="Grupo Vazse" class="navbar-brand">
                        <p>Grupo Vazse</p>
                    </a>
                    <div class="nav-toggle">
                      
                    </div>
                </div>
            </div>
            
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item {{ request()->routeIs('documentos.index') ? 'active' : '' }}">
                            <a href="{{ route('documentos.index') }}">
                                <i class="fas fa-home"></i>
                                <p>Panel General</p>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('documentos.create') ? 'active' : '' }}">
                            <a href="{{ route('documentos.create') }}">
                                <i class="fas fa-upload"></i>
                                <p>Subir Documentos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#">
                                <i class="fas fa-file-alt"></i>
                                <p>Mis Operaciones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#">
                                <i class="fas fa-cog"></i>
                                <p>Configuración</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>Cerrar Sesión</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

     
        <div class="main-panel">
            
            <div class="main-header">
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <div>
                            <h3 class="fw-bold mb-1">Documentos</h3>
                            <h6 class="op-2 mb-2">Sistema de control de documentos</h6>
                        </div>
                        
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hola,</span>
                                        <span class="fw-bold">Usuario</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded">
                                                </div>
                                                <div class="u-text">
                                                    <h4>Usuario</h4>
                                                    <p class="text-muted">Administrador</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user me-2"></i>Mi Perfil
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

          
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>

           
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Grupo Vazse
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2025, Desarrollado por <i class="fa fa-heart heart text-danger"></i> por
                        <a href="#">Grupo Vazse</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
       
        document.addEventListener('DOMContentLoaded', function() {
           
            const toggleBtn = document.createElement('button');
            toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
            toggleBtn.className = 'btn btn-primary d-md-none position-fixed';
            toggleBtn.style.cssText = 'top: 20px; left: 20px; z-index: 1001; width: 45px; height: 45px; border-radius: 50%;';
            
            const sidebar = document.querySelector('.sidebar');
            
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-open');
            });
            
            document.body.appendChild(toggleBtn);
            
            
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                        sidebar.classList.remove('mobile-open');
                    }
                }
            });
        });
    </script>

    @yield('scripts')
</body>
</html>