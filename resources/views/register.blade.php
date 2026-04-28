<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .input-group-text {
            background-color: #fff;
            border-right: 0;
        }

        .form-control {
            border-left: 0;
        }

        .btn-custom {
            border-radius: 6px;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif
<div class="container d-flex justify-content-center align-items-center vh-100 mt-5 mb-5">
    <div class="col-md-6 col-lg-5">
        <div class="card p-4 bg-white">

            <div class="text-center mb-3">
                <i class="bi bi-person-plus fs-2 text-secondary"></i>
                <h5 class="mt-2">Create Account</h5>
                <p class="text-muted small">Register to continue</p>
            </div>

            <form action="{{ route('save_record') }}" method="post">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-person"></i>
            </span>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Enter your name">
        </div>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-envelope"></i>
            </span>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Enter your email">
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

    <!-- Confirm Password -->
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-shield-lock"></i>
            </span>
            <input type="password" name="password_confirmation"
                   class="form-control"
                   placeholder="Confirm password">
        </div>
    </div>

    <!-- Terms -->
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="terms">
        <label class="form-check-label small">
            I agree to the Terms
        </label>
        @error('terms')
            <br><small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Button -->
    <div class="d-grid">
        <button type="submit" class="btn btn-dark">
            <i class="bi bi-check-circle me-1"></i> Register
        </button>
    </div>
</form>

            <div class="text-center mt-3">
                <small class="text-muted">
                    Already have an account? <a href="{{route('showLogin')}}">Login</a>
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>