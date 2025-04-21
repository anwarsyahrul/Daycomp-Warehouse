<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Daycomp Warehouse</title>
    <link href="{{ mix('css/coreui.min.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            width: 400px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }

        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%; /* Make the logo perfectly round */
            object-fit: cover;  /* Ensure the image fits without distortion */
            margin: 0 auto 20px;
            display: block;
            border: 3px solid #007bff; /* Optional border around the logo */
        }

        .warehouse-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card shadow p-4">
        <!-- Rounded Logo Section -->
        <div class="text-center mb-3">
            <img src="{{ asset('images/logo.jpg') }}" alt="Daycomp Logo" class="logo"> <!-- Place your logo in public/images/logo.png -->
        </div>

        <h4 class="text-center mb-4">Admin Login</h4>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
