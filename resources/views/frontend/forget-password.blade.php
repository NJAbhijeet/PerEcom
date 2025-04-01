<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Fruitables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Light Green Background */
            color: #1b5e20; /* Dark Green Text */
        }
        .navbar {
            background-color: #66bb6a; /* Fresh Green Navbar */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand h1 {
            color: #ffffff; /* White Text for Logo */
        }
        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #388e3c; /* Deep Green Button */
            border: none;
        }
        .btn-primary:hover {
            background-color: #2e7d32; /* Darker Green on Hover */
        }
        footer {
            background-color: #43a047; /* Vibrant Green Footer */
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        .text-primary {
            color: #43a047 !important; /* Footer Link Color */
        }
        .invalid-feedback {
            color: #d32f2f; /* Red Error Messages */
        }
    </style>
</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1>Fruitables</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Forgot Password Section Start -->
    <section class="vh-100 d-flex align-items-center justify-content-center bg-light py-5">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-3">
                <h2 class="text-primary">Forgot Password</h2>
                <p class="text-muted">Enter your email to reset your password.</p>
            </div>
            <form class="needs-validation" novalidate>
                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm mt-3">
                    Send Reset Link
                </button>
            </form>

            <!-- Back to Login Link -->
            <div class="text-center mt-3">
                <a href="{{route('login')}}" class="text-decoration-none text-primary">Back to Login</a>
            </div>
        </div>
    </section>
    <!-- Forgot Password Section End -->

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Fruitables. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Basic Form Validation -->
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            this.classList.add('was-validated');
        });
    </script>
</body>
</html>
