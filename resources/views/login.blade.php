<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 8px;
        }
        .form-control:focus {
            box-shadow: none;
        }
        .input-group-text {
            background: #fff;
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="col-md-4">
        <div class="card p-4">

            <div class="text-center mb-3">
                <h5>Login</h5>
                <p class="text-muted small">Enter your details</p>
            </div>

         <form action="{{ route('login_user') }}" method="post">
    @csrf

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-envelope"></i>
            </span>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Enter email">
        </div>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-lock"></i>
            </span>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Enter password">
        </div>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Options -->
    <div class="d-flex justify-content-between mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember">
            <label class="form-check-label small">Remember</label>
        </div>
        <a href="#" class="small text-decoration-none">Forgot?</a>
    </div>

    <!-- Button -->
    <div class="d-grid">
        <button type="submit" class="btn btn-dark">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
        </button>
    </div>
</form>

            <div class="text-center mt-3">
                <small class="text-muted">
                    No account? <a href="{{route('showRegister')}}">Sign up</a>
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>