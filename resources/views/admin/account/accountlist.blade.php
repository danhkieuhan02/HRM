@extends('admin.layout')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold">Danh sách người dùng</h4>
                    <button class="btn btn-outline-light btn-sm fw-medium shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#addUserModal">
                        <i class="bi bi-plus-lg"></i> Thêm tài khoản
                    </button>
                </div>
            </div>
            <div class="card-body bg-light p-4">
                <!-- Form tìm kiếm -->
                <form action="#" method="GET" class="mb-4">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" name="search" class="form-control" placeholder="Tìm theo tên hoặc email"
                                value="{{ request('search') }}" style="border-radius: 25px 0 0 25px;">
                            <button type="submit" class="btn btn-outline-primary" style="border-radius: 0 25px 25px 0;">
                                <i class="bi bi-search"></i> Tìm kiếm
                            </button>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-pill">
                            <i class="bi bi-arrow-clockwise"></i> Làm mới
                        </a>
                    </div>
                </form>

                <!-- Bảng dữ liệu -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered"
                        style="background: white; border-radius: 10px; overflow: hidden;">
                        <thead style="background: #343a40; color: white;">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->IsAdmin ? 'Admin' : 'Người dùng thường' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="bi bi-pencil"></i> Sửa
                                            </a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                                    <i class="bi bi-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="bi bi-emoji-frown me-2"></i> Không có người dùng nào
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm/Cập nhật tài khoản -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-header text-white py-3"
                    style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                    <h5 class="modal-title fw-bold" id="addUserModalLabel">Thêm tài khoản</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <form id="addUserForm" action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="user_id">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-medium">Tên tài khoản <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-pill" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control rounded-pill" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium">Mật khẩu</label>
                            <input type="password" class="form-control rounded-pill" id="password" name="password">
                            <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
                        </div>
                        <div class="mb-3">
                            <label for="is_admin" class="form-label fw-medium">Vai trò <span
                                    class="text-danger">*</span></label>
                            <select class="form-select rounded-pill" id="is_admin" name="RoleId" required>
                                <option value="0">Người dùng thường</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="bi bi-save me-2"></i> Lưu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS tùy chỉnh -->
    <style>
        body {
            background: #f4f7fa;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .table-hover tbody tr:hover {
            background: #e9ecef;
            transition: background 0.2s ease;
        }

        .btn-outline-info {
            border-color: #17a2b8;
            color: #17a2b8;
        }

        .btn-outline-info:hover {
            background: #17a2b8;
            color: white;
            border-color: #17a2b8;
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background: #dc3545;
            color: white;
            border-color: #dc3545;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }

        .btn-primary {
            background: #4e73df;
            border: none;
        }

        .btn-primary:hover {
            background: #224abe;
        }

        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
            color: #4e73df;
        }

        .pagination .page-item.active .page-link {
            background: #4e73df;
            border-color: #4e73df;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.getElementById('addUserModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('addUserForm').reset();
            document.getElementById('user_id').value = '';
            document.getElementById('addUserModalLabel').textContent = 'Thêm tài khoản';
            document.getElementById('password').required = false;
        });
    </script>
@endsection
