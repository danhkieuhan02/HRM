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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#" data-lang="HRM Giáo Dục">HRM System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/" data-lang="Trang Chủ">Trang
                            Chủ</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ url('/resources/views/news/recruitment.blade.php') }}" data-lang="Tuyển Dụng">Tuyển
                            Dụng</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" data-lang="Tin Tức">Tin Tức</a></li>
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="authDropdown" data-bs-toggle="dropdown"
                                data-lang="Tài Khoản">Tài Khoản</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('account.login') }}" data-lang="Đăng Nhập">Đăng
                                        Nhập</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.register') }}" data-lang="Đăng Ký">Đăng
                                        Ký</a></li>
                            </ul>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown"
                                data-lang="Tài Khoản">Tài Khoản</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('account.changePassword') }}"
                                        data-lang="Đổi Mật Khẩu">Đổi Mật Khẩu</a></li>
                                <li><a class="dropdown-item" href="{{ route('account.logout') }}" data-lang="Đăng Xuất"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                                        Xuất</a></li>
                            </ul>
                        </li>
                        <form id="logout-form" action="{{ route('account.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="langDropdown" data-bs-toggle="dropdown">
                            Ngôn Ngữ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" id="langVN">Tiếng Việt</a></li>
                            <li><a class="dropdown-item" href="#" id="langEN">English</a></li>
                        </ul>
                    </li>
                </ul>
                <button id="modeToggle" class="btn ms-2">
                    <i class="fas fa-sun"></i>
                </button>
            </div>
        </div>
    </nav>
    {{-- slidebar here --}}
    <div class="slidebar-banner mt-5 d-flex justify-content-center">
        <div id="carouselExampleAutoplaying" class="carousel slide w-50" data-bs-ride="carousel"
            data-bs-interval="1500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Slidebar2.jpg') }}" class="d-block w-100" alt="Slidebar Image 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/Slidebar2.jpg') }}" class="d-block w-100" alt="Slidebar Image 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/Slidebar2.jpg') }}" class="d-block w-100" alt="Slidebar Image 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Latest News Section -->
        <section class="mb-5">
            <h2 class="text-center mb-4" data-lang="Tin tức mới nhất">Tin tức mới nhất</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <div class="card-body">
                            <h5 class="card-title" data-lang="Cách tối ưu hóa quy trình tuyển dụng">Cách tối ưu
                                hóa
                                quy
                                trình tuyển dụng</h5>
                            <p class="card-text"
                                data-lang="Tìm hiểu các mẹo để cải thiện hiệu quả tuyển dụng trong giáo dục.">
                                Tìm hiểu các mẹo để cải thiện hiệu quả tuyển dụng trong giáo dục.
                            </p>
                            <a href="#" class="btn btn-primary" data-lang="Đọc thêm">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <div class="card-body">
                            <h5 class="card-title" data-lang="AI trong quản lý nhân sự">AI trong quản lý nhân
                                sự
                            </h5>
                            <p class="card-text" data-lang="Khám phá cách AI thay đổi cách quản lý nhân sự hiện đại.">
                                Khám phá cách AI thay đổi cách quản lý nhân sự hiện đại.
                            </p>
                            <a href="#" class="btn btn-primary" data-lang="Đọc thêm">Đọc thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <div class="card-body">
                            <h5 class="card-title" data-lang="Tăng cường phúc lợi cho giáo viên">Tăng cường
                                phúc
                                lợi
                                cho
                                giáo viên</h5>
                            <p class="card-text" data-lang="Những cách cải thiện phúc lợi để giữ chân nhân tài.">
                                Những cách cải thiện phúc lợi để giữ chân nhân tài.
                            </p>
                            <a href="#" class="btn btn-primary" data-lang="Đọc thêm">Đọc thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h1 class="text-center mb-4" data-lang="Phần Mềm Quản Lý Nhân Sự Giáo Dục">
            Phần Mềm Quản Lý Nhân Sự Giáo Dục
        </h1>

        <!-- Introduction Section -->
        <section class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    <h2 data-lang="Giới thiệu">Giới thiệu</h2>
                    <p
                        data-lang="Phần mềm HRM Giáo Dục là giải pháp tối ưu giúp quản lý nhân sự và tuyển dụng trong lĩnh vực giáo dục. Với giao diện thân thiện, tính năng hiện đại, chúng tôi hỗ trợ bạn tiết kiệm thời gian và nâng cao hiệu quả công việc.">
                        Phần mềm HRM Giáo Dục là giải pháp tối ưu giúp quản lý nhân sự và tuyển dụng trong lĩnh
                        vực
                        giáo
                        dục. Với giao diện thân thiện, tính năng hiện đại, chúng tôi hỗ trợ bạn tiết kiệm thời
                        gian
                        và
                        nâng cao hiệu quả công việc.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('img/banner.jpg') }}" alt="HRM Image" class="img-fluid rounded">
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="mb-5">
            <h2 class="text-center mb-4" data-lang="Tính năng nổi bật">Tính năng nổi bật</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" data-lang="Quản Lý Tuyển Dụng">Quản Lý Tuyển Dụng</h5>
                            <p class="card-text"
                                data-lang="Theo dõi tiến trình phỏng vấn, đăng tin tuyển dụng, nhận CV, tự động phản hồi qua email, lưu hồ sơ ứng viên, và lọc ứng viên bằng AI.">
                                Theo dõi tiến trình phỏng vấn, đăng tin tuyển dụng, nhận CV, tự động phản hồi
                                qua
                                email,
                                lưu hồ sơ ứng viên, và lọc ứng viên bằng AI.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" data-lang="Quản Lý Nhân Sự">Quản Lý Nhân Sự</h5>
                            <p class="card-text"
                                data-lang="Quản lý thông tin cá nhân, chuyên môn, quan hệ gia đình, khen thưởng, kỷ luật, hợp đồng, và nghỉ phép.">
                                Quản lý thông tin cá nhân, chuyên môn, quan hệ gia đình, khen thưởng, kỷ luật,
                                hợp
                                đồng,
                                và nghỉ phép.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" data-lang="Tính Lương & Phúc Lợi">Tính Lương & Phúc Lợi
                            </h5>
                            <p class="card-text"
                                data-lang="Tự động tính lương dựa trên hợp đồng, phụ cấp, thưởng, khấu trừ thuế và bảo hiểm.">
                                Tự động tính lương dựa trên hợp đồng, phụ cấp, thưởng, khấu trừ thuế và bảo
                                hiểm.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog and Subscription Form Section -->
        <div class="container mt-5">
            <!-- Latest News Section, Introduction Section, Features Section giữ nguyên -->

            <!-- Blog and Subscription Form Section -->
            <section class="mb-5">
                <div class="row">
                    <!-- Blog Cards (Full Width) -->
                    <div class="col-md-12 mb-4">
                        <h2 class="mb-4" data-lang="Bài viết nổi bật">Bài viết nổi bật</h2>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card blog-card">
                                    <div class="card-body">
                                        <h5 class="card-title" data-lang="Tầm quan trọng của quản lý nhân sự">
                                            Tầm
                                            quan
                                            trọng của quản lý nhân sự</h5>
                                        <p class="card-text"
                                            data-lang="Hiểu vai trò của HRM trong giáo dục hiện đại.">
                                            Hiểu vai trò của HRM trong giáo dục hiện đại.
                                        </p>
                                        <a href="#" class="btn btn-primary" data-lang="Đọc thêm">Đọc
                                            thêm</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card blog-card">
                                    <div class="card-body">
                                        <h5 class="card-title" data-lang="Cách sử dụng phần mềm HRM">Cách sử
                                            dụng
                                            phần
                                            mềm HRM</h5>
                                        <p class="card-text"
                                            data-lang="Hướng dẫn cơ bản để bắt đầu với HRM Giáo Dục.">
                                            Hướng dẫn cơ bản để bắt đầu với HRM Giáo Dục.
                                        </p>
                                        <a href="#" class="btn btn-primary" data-lang="Đọc thêm">Đọc
                                            thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscription Form (Full Width Below) -->
                    <div class="col-md-12 mb-4">
                        <div class="recruitment-form-container">
                            <h3 class="text-center mb-4" data-lang="Đăng Ký Nhận Tin Tuyển Dụng">Đăng Ký Nhận
                                Tin
                                Tuyển Dụng</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label" data-lang="Họ và Tên">Họ và
                                        Tên</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Nhập họ tên" data-lang-placeholder="Nhập họ tên">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label" data-lang="Email">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Nhập email" data-lang-placeholder="Nhập email">
                                </div>
                                <button type="submit" class="btn btn-primary w-100" data-lang="Gửi">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section, Footer, và Script giữ nguyên -->
        </div>
        <!-- Testimonials Section -->
        <section class="mb-5">
            <h2 class="text-center mb-4" data-lang="Phản hồi từ người dùng">Phản hồi từ người dùng</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"
                                data-lang="“Phần mềm rất dễ sử dụng, giúp tôi tiết kiệm rất nhiều thời gian trong việc quản lý nhân sự.”">
                                “Phần mềm rất dễ sử dụng, giúp tôi tiết kiệm rất nhiều thời gian trong việc quản
                                lý
                                nhân
                                sự.”
                            </p>
                            <p class="text-end" data-lang="- Nguyễn Văn A, Quản lý nhân sự">- Nguyễn Văn A,
                                Quản
                                lý
                                nhân sự</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"
                                data-lang="“Tính năng lọc ứng viên bằng AI thực sự ấn tượng, chính xác và nhanh chóng!”">
                                “Tính năng lọc ứng viên bằng AI thực sự ấn tượng, chính xác và nhanh chóng!”
                            </p>
                            <p class="text-end" data-lang="- Trần Thị B, Chuyên viên tuyển dụng">- Trần Thị B,
                                Chuyên
                                viên tuyển dụng</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h3>HỆ THỐNG QUẢN LÝ NHÂN SỰ</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Địa chỉ: Phòng 101, tòa nhà HRM, Khu đô thị ABC, Quận
                        Ninh Kiều, TP. Cần Thơ</li>
                    <li><i class="fas fa-phone-alt"></i> Điện thoại: 0123.456789 – Kiều Hân</li>
                    <li><i class="fas fa-envelope"></i> Email: support@hrmsystem.com</li>
                    <li><i class="fas fa-globe"></i> Website: www.hrmsystem.com</li>
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
                <h3>LIÊN HỆ CÔNG VIỆC VỚI HRM</h3>
                <div class="phone-input">
                    <input type="text" placeholder="Nhập số điện thoại của bạn *">
                    <button>Gửi</button>
                </div>
                <p class="social-text">Mạng XH: <a href="#"><i class="fab fa-facebook-f"></i> Hrms</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>COPYRIGHT © 2024 HRMS.COM.VN</p>
        </div>
        <div class="container text-center">
            <p data-lang="© 2025 Phần Mềm Quản Lý Nhân Sự Giáo Dục">© 2025 Phần Mềm Quản Lý Nhân Sự Trong Giáo Dục</p>
            <p data-lang="Thiết kế bởi: [Han] | Email: danhkieuhan135@example.com | SĐT: 0123-456-789">
                Thiết kế bởi: [Han] | Email: danhkieuhan135@gmail.com | SĐT: 0123-456-789
            </p>
        </div>
    </footer>
</body>
<button id="backToTop" class="btn btn-primary back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<!-- Bootstrap JS and Custom Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Language Switcher
    const translations = {
        "HRM Giáo Dục": "HRM Education",
        "Trang Chủ": "Home",
        "Tuyển Dụng": "Recruitment",
        "Tin Tức": "News",
        "Đăng Nhập": "Login",
        "Hồ Sơ Ứng Viên": "Candidate Profiles",
        "Quản Lý Nhân Sự": "HR Management",
        "Tính Lương": "Payroll",
        "Dịch Vụ ESS": "ESS Services",
        "Phần Mềm Quản Lý Nhân Sự Giáo Dục": "Education HR Management Software",
        "Giới thiệu": "Introduction",
        "Phần mềm HRM Giáo Dục là giải pháp tối ưu giúp quản lý nhân sự và tuyển dụng trong lĩnh vực giáo dục. Với giao diện thân thiện, tính năng hiện đại, chúng tôi hỗ trợ bạn tiết kiệm thời gian và nâng cao hiệu quả công việc.": "HRM Education software is an optimal solution for managing HR and recruitment in the education sector. With a user-friendly interface and modern features, we help you save time and enhance work efficiency.",
        "Tính năng nổi bật": "Key Features",
        "Quản Lý Tuyển Dụng": "Recruitment Management",
        "Theo dõi tiến trình phỏng vấn, đăng tin tuyển dụng, nhận CV, tự động phản hồi qua email, lưu hồ sơ ứng viên, và lọc ứng viên bằng AI.": "Track interview progress, post job listings, receive CVs, auto-reply via email, store candidate profiles, and filter candidates with AI.",
        "Quản lý thông tin cá nhân, chuyên môn, quan hệ gia đình, khen thưởng, kỷ luật, hợp đồng, và nghỉ phép.": "Manage personal info, expertise, family relations, rewards, discipline, contracts, and leave.",
        "Tính Lương & Phúc Lợi": "Payroll & Benefits",
        "Tự động tính lương dựa trên hợp đồng, phụ cấp, thưởng, khấu trừ thuế và bảo hiểm.": "Auto-calculate salary based on contracts, allowances, bonuses, tax, and insurance deductions.",
        "Dịch Vụ ESS": "ESS Services",
        "Nhân viên xem/sửa thông tin cá nhân, xem phiếu lương, đăng ký nghỉ phép, gửi yêu cầu.": "Employees view/edit personal info, view payslips, request leave, and submit requests.",
        "Đăng Ký Nhận Tin Tuyển Dụng": "Subscribe to Recruitment News",
        "Họ và Tên": "Full Name",
        "Email": "Email",
        "Gửi": "Submit",
        "Phản hồi từ người dùng": "User Feedback",
        "Tin tức mới nhất": "Latest News",
        "Cách tối ưu hóa quy trình tuyển dụng": "How to Optimize Recruitment Process",
        "Tìm hiểu các mẹo để cải thiện hiệu quả tuyển dụng trong giáo dục.": "Learn tips to improve recruitment efficiency in education.",
        "AI trong quản lý nhân sự": "AI in HR Management",
        "Khám phá cách AI thay đổi cách quản lý nhân sự hiện đại.": "Explore how AI transforms modern HR management.",
        "Tăng cường phúc lợi cho giáo viên": "Enhancing Teacher Benefits",
        "Những cách cải thiện phúc lợi để giữ chân nhân tài.": "Ways to improve benefits to retain talent.",
        "Bài viết nổi bật": "Featured Articles",
        "Tầm quan trọng của quản lý nhân sự": "The Importance of HR Management",
        "Hiểu vai trò của HRM trong giáo dục hiện đại.": "Understand the role of HRM in modern education.",
        "Cách sử dụng phần mềm HRM": "How to Use HRM Software",
        "Hướng dẫn cơ bản để bắt đầu với HRM Giáo Dục.": "Basic guide to getting started with HRM Education.",
        "Đọc thêm": "Read More",
        "Nhập họ tên": "Enter your name",
        "Nhập email": "Enter your email",
        "“Phần mềm rất dễ sử dụng, giúp tôi tiết kiệm rất nhiều thời gian trong việc quản lý nhân sự.”": "“The software is very easy to use, saving me a lot of time in HR management.”",
        "- Nguyễn Văn A, Quản lý nhân sự": "- Nguyen Van A, HR Manager",
        "“Tính năng lọc ứng viên bằng AI thực sự ấn tượng, chính xác và nhanh chóng!”": "“The AI candidate filtering feature is truly impressive, accurate, and fast!”",
        "- Trần Thị B, Chuyên viên tuyển dụng": "- Tran Thi B, Recruitment Specialist",
        "© 2025 Phần Mềm Quản Lý Nhân Sự Giáo Dục": "© 2025 Education HR Management Software",
        "Thiết kế bởi: [Tên của bạn] | Email: your.email@example.com | SĐT: 0123-456-789": "Designed by: [Your Name] | Email: your.email@example.com | Phone: 0123-456-789"
    };

    document.getElementById('langVN').addEventListener('click', () => {
        document.querySelectorAll('[data-lang]').forEach(el => {
            el.textContent = el.getAttribute('data-lang');
        });
        document.querySelectorAll('[data-lang-placeholder]').forEach(el => {
            el.placeholder = el.getAttribute('data-lang-placeholder');
        });
    });

    document.getElementById('langEN').addEventListener('click', () => {
        document.querySelectorAll('[data-lang]').forEach(el => {
            el.textContent = translations[el.getAttribute('data-lang')] || el.getAttribute('data-lang');
        });
        document.querySelectorAll('[data-lang-placeholder]').forEach(el => {
            el.placeholder = translations[el.getAttribute('data-lang-placeholder')] || el.getAttribute(
                'data-lang-placeholder');
        });
    });

    // Dark/Light Mode Toggle
    const modeToggle = document.getElementById('modeToggle');
    modeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        const icon = modeToggle.querySelector('i');
        icon.classList.toggle('fa-sun');
        icon.classList.toggle('fa-moon');
    });

    //Back to top
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
{{-- giao diện phân trang --}}
{{-- {{ $data->links() }} --}}
