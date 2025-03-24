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

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#" data-lang="HRM Giáo Dục">HRM Giáo Dục</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/" data-lang="Trang Chủ">Trang
                        Chủ</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/resources/views/news/recruitment.blade.php') }}"
                        data-lang="Tuyển Dụng">Tuyển Dụng</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#" data-lang="Tin Tức">Tin Tức</a></li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('account.login') }}" data-lang="Đăng Nhập">Đăng
                            Nhập</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('account.logout') }}" data-lang="Đăng Xuất"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng
                            Xuất</a></li>
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
