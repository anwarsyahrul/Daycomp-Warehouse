<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daycomp Warehouse</title>

    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.2/dist/css/coreui.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/icons@2.1.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            display: flex;
            background: #f0f4ff; /* very light blue */
        }
    
        /* Sidebar Styling */
        .c-sidebar {
            width: 260px;
            height: 100vh;
            background: #1e40af; /* blue-800 */
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: #ffffff;
            transition: width 0.3s ease-in-out;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }
    
        .c-sidebar.collapsed {
            width: 80px;
        }
    
        .c-sidebar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
            padding: 15px;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    
        .c-sidebar.collapsed .c-sidebar-brand span {
            display: none;
        }
    
        .c-sidebar-toggler {
            background: none;
            border: none;
            color: #ffffff;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }
    
        .c-sidebar.collapsed .c-sidebar-toggler {
            transform: rotate(180deg);
        }
    
        .c-sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
        }
    
        .c-sidebar-nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #dbeafe; /* blue-100 */
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s, color 0.3s;
        }
    
        .c-sidebar-nav-link i {
            font-size: 1.4rem;
            margin-right: 12px;
            transition: margin-right 0.3s ease-in-out, color 0.3s;
        }
    
        .c-sidebar-nav-link:hover,
        .c-sidebar-nav-link.active {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
        }
    
        .c-sidebar-nav-link:hover i,
        .c-sidebar-nav-link.active i {
            color: #ffffff;
        }
    
        .c-sidebar.collapsed .c-sidebar-nav-link i {
            margin-right: 0;
        }
    
        .c-sidebar.collapsed .c-sidebar-nav-link span {
            display: none;
        }
    
        .c-sidebar-footer {
            padding: 15px;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.2);
        }
    
        .btn-logout {
            width: 100%;
            padding: 10px;
            background: #2563eb; /* blue-600 */
            color: #ffffff;
            border-radius: 6px;
            font-size: 1rem;
            text-decoration: none;
            display: block;
            transition: background 0.3s;
        }
    
        .c-sidebar.collapsed .btn-logout {
            font-size: 0;
            padding: 10px 5px;
        }
    
        .btn-logout:hover {
            background: #1e3a8a; /* blue-900 */
        }
    
        .c-wrapper {
            flex-grow: 1;
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
            width: 100%;
            background: #ffffff;
        }
    
        .c-sidebar.collapsed + .c-wrapper {
            margin-left: 80px;
        }
    </style>    
</head>
<body>
    <!-- Sidebar -->
    <div class="c-sidebar" id="sidebar">
        <div class="c-sidebar-brand">
            <span>Daycomp</span>
            <button id="sidebarToggle" class="c-sidebar-toggler">☰</button>
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="cil-speedometer"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="cil-list"></i> <span>Products</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                    <i class="cil-tag"></i> <span>Categories</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('stocks.*') ? 'active' : '' }}" href="{{ route('stocks.index') }}">
                    <i class="cil-layers"></i> <span>Stocks</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('racks.*') ? 'active' : '' }}" href="{{ route('racks.index') }}">
                    <i class="cil-grid"></i> <span>Racks</span>
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('shelves.*') ? 'active' : '' }}" href="{{ route('shelves.index') }}">
                    <i class="cil-layers"></i> <span>Shelves</span>
                </a>
            </li>            
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('warehouses.*') ? 'active' : '' }}" href="{{ route('warehouses.index') }}">
                    <i class="cil-home"></i> <span>Warehouses</span>
                </a>
            </li>
            
            <!-- Add Suppliers menu below Warehouses -->
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('suppliers.*') ? 'active' : '' }}" href="{{ route('suppliers.index') }}">
                    <i class="cil-people"></i> <span>Suppliers</span>
                </a>
            </li>
            
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->routeIs('history.*') ? 'active' : '' }}" href="{{ route('history.index') }}">
                    <i class="cil-history"></i> <span>History</span>
                </a>
            </li>
        </ul>
        <div class="c-sidebar-footer">
            <a href="{{ route('admin.logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="c-wrapper">
        <main class="c-main">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- CoreUI JS -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.2/dist/js/coreui.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const contentWrapper = document.querySelector('.c-wrapper');
            const toggleButton = document.getElementById('sidebarToggle');

            if (localStorage.getItem('sidebar-collapsed') === 'true') {
                sidebar.classList.add('collapsed');
                contentWrapper.style.marginLeft = "80px";
            }

            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                contentWrapper.style.marginLeft = sidebar.classList.contains('collapsed') ? "80px" : "260px";

                localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));
            });
        });
    </script>
</body>
</html>
