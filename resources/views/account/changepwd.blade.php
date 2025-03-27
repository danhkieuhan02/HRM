<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Mật Khẩu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/changepwd.css') }}">
</head>

<body>
    {{-- Thanh menu ở admin --}}
    @include('include/adminnav')

    <div class="container d-flex justify-content-center align-items-center min-vh-100 bottom-0 end-0 p-3">
        @if (session()->has('_success'))
            <div class="mt-2 alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3"
                role="alert">
                {{ session('_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('_errors'))
            <div class="mt-2 alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 m-3"
                role="alert">
                {{ session('_errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="login-form-container">
            <h2 class="text-center mb-4">Đổi Mật Khẩu</h2>
            <form action="{{ route('account.changePassword') }}" method="post">
                @csrf
                @include('include.errors')
                <div class="mb-3">
                    <label for="current_password" class="form-label">Mật Khẩu Hiện Tại</label>
                    <input type="password" class="form-control" id="current_password" name="current_password"
                        placeholder="Nhập mật khẩu hiện tại" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Mật Khẩu Mới</label>
                    <input type="password" class="form-control" id="new_password" name="new_password"
                        placeholder="Nhập mật khẩu mới" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Xác Nhận Mật Khẩu Mới</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        placeholder="Xác nhận mật khẩu mới" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đổi Mật Khẩu</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
