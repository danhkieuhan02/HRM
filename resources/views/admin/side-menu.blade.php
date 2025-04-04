<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="../index.html" class="brand-link">
            <img src="{{ asset('admin/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">HRM System</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>

                {{-- user --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Hệ thống
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="../role.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Phân quyền hệ thống</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Quản lý vai trò</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Quản lý tài khoản</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Employee --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Quản lý nhân sự
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.employees.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Thông tin nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contracts.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Hợp đồng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.positions.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Vị trí</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.departments.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Phòng ban</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Lương thưởng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Nghỉ phép</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Tuyển dụng
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../widgets/small-box.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ứng viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../widgets/info-box.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>CV</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../widgets/cards.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Liên hệ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Ess
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Thông tin tài khoản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Thay đổi mật khẩu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Đăng xuất
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                </div>
            </ul>
        </nav>
    </div>
</aside>
