<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    {{-- Thanh menu ở admin --}}
    @include('include/adminnav')

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        @if (!empty(session('_success')))
            <div class="mt-2 alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3"
                role="alert">
                {{ session('_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (!empty(session('_errors')))
            <div class="mt-2 alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 m-3"
                role="alert">
                {{ session('_errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="login-form-container">
            <h2 class="text-center mb-4">Đăng ký tài khoản</h2>
            <form action="{{ route('account.save') }}" method="post">
                @csrf
                @include('include.errors')
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Nhập tên"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật Khẩu</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Nhập mật khẩu" required>
                </div>
                <div class="mb-3">
                    <label for="cf_password" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="cf_password" name="cf_password"
                        placeholder="Nhập lại mật khẩu" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng Ký</button>
                <div class="mt-3 text-center">
                    <i>Đã có tài khoản? Vui lòng trở về trang đăng nhập!</i>
                    <a href="{{ route('account.register') }}" class="text-decoration-none">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
