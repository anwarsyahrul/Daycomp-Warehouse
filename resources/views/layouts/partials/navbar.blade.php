<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.1/dist/css/coreui.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
</head>
<body>
    <header class="c-header c-header-light c-header-fixed">
        <!-- Sidebar Toggle -->
        <button class="c-header-toggler c-class-toggler" type="button" data-target="#sidebar" data-class="c-sidebar-show">
            <i class="c-icon c-icon-lg cil-menu"></i>
        </button>

        <!-- Navbar Brand -->
        <a class="c-header-brand d-md-down-none" href="/">
            <h4 class="m-0">Daycomp Warehouse</h4>
        </a>

        <!-- Navbar Items (Right-Aligned) -->
        <ul class="c-header-nav ml-auto">
            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link dropdown-toggle" data-coreui-toggle="dropdown" href="#" role="button">
                    <i class="c-icon c-icon-lg cil-user"></i> Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <a class="dropdown-item" href="#">
                        <i class="c-icon cil-settings mr-2"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="c-icon cil-account-logout mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.3.1/dist/js/coreui.bundle.min.js"></script>
</body>
</html>
