<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS - Hệ Thống Quản Lý Nhân Sự Trong Giáo Dục</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
</head>

<body>
    @include('include/adminnav')
    <div class="container">
        @if (!empty(session('_success')))
            <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (!empty(session('_errors')))
            <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('_errors') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{ $slot }}
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h3>CÔNG TY TẤT THÀNH</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Địa chỉ: Phòng 3304, tòa nhà SAK2, Khu đô thị Vinhomes
                        Smart City, Tây Mỗ, Nam Từ Liêm, Hà Nội</li>
                    <li><i class="fas fa-phone-alt"></i> Điện thoại: 0963.239222 – Em Thủy</li>
                    <li><i class="fas fa-envelope"></i> Email: lienhe@tattthanh.com.vn</li>
                    <li><i class="fas fa-globe"></i> Website: www.tattthanh.com.vn</li>
                </ul>
            </div>
            <div class="footer-center">
                <h3>TRUY CẬP NHANH</h3>
                <ul>
                    <li><a href="#">THÔNG TIN CẦN BIẾT</a></li>
                    <li><a href="#">BLOG</a></li>
                </ul>
                <div class="question-box">
                    <p>Tại sao việc đăng ký với Bộ Công Thương Việt Nam quan trọng đối với khách hàng?</p>
                    <p>Lợi ích của DMCA trong việc bảo vệ nội dung website</p>
                </div>
            </div>
            <div class="footer-right">
                <h3>BÁN CĂN CHUNG TỐI GỌI LÀ</h3>
                <div class="phone-input">
                    <input type="text" placeholder="Nhập số điện thoại của bạn *">
                    <button>Gửi</button>
                </div>
                <p class="social-text">Mạng XH: <a href="#"><i class="fab fa-facebook-f"></i> tattthanh</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>COPYRIGHT © 2024 TATTTHANH.COM.VN</p>
        </div>
        <div class="container text-center">
            <p data-lang="© 2025 Phần Mềm Quản Lý Nhân Sự Giáo Dục">© 2025 Phần Mềm Quản Lý Nhân Sự Giáo Dục</p>
            <p data-lang="Thiết kế bởi: [Tên của bạn] | Email: your.email@example.com | SĐT: 0123-456-789">
                Thiết kế bởi: [Tên của bạn] | Email: your.email@example.com | SĐT: 0123-456-789
            </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    {{ $js ?? '' }}

</body>

</html>
