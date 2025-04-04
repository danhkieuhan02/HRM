@extends('admin.layout')

@section('title', 'Danh sách vai trò')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold">Danh sách vai trò</h4>
                    <button class="btn btn-outline-light btn-sm fw-medium shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#addRoleModal">
                        <i class="bi bi-plus-lg"></i> Thêm vai trò
                    </button>
                </div>
            </div>
            <div class="card-body bg-light p-4">
                <!-- Form tìm kiếm -->
                <form action="#" method="GET" class="mb-4">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" name="search" class="form-control" placeholder="Tìm theo tên vai trò"
                                value="{{ request('search') }}" style="border-radius: 25px 0 0 25px;">
                            <button type="submit" class="btn btn-outline-primary" style="border-radius: 0 25px 25px 0;">
                                <i class="bi bi-search"></i> Tìm kiếm
                            </button>
                        </div>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary rounded-pill">
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
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $role->RoleID }}</td>
                                    <td>{{ $role->RoleName }}</td>
                                    <td>{{ $role->Description }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-info rounded-pill edit-role"
                                                data-id="{{ $role->RoleID }}" data-name="{{ $role->RoleName }}"
                                                data-description="{{ $role->Description }}" data-bs-toggle="modal"
                                                data-bs-target="#addRoleModal">
                                                <i class="bi bi-pencil"></i> Sửa
                                            </button>
                                            <form action="{{ route('admin.roles.destroy', $role->RoleID) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa vai trò này?')">
                                                    <i class="bi bi-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        <i class="bi bi-emoji-frown me-2"></i> Không có vai trò nào
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm/Cập nhật vai trò -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden;">
                <div class="modal-header text-white py-3"
                    style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                    <h5 class="modal-title fw-bold" id="addRoleModalLabel">Thêm vai trò</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <form id="roleForm" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="role_id">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-medium">Tên vai trò <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-pill" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-medium">Mô tả <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control rounded-pill" id="description" name="description" rows="3" required></textarea>
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
        document.getElementById('addRoleModal').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const form = document.getElementById('roleForm');
            const modalTitle = document.getElementById('addRoleModalLabel');

            if (button.classList.contains('edit-role')) {
                // Cập nhật vai trò
                const roleId = button.getAttribute('data-id');
                const roleName = button.getAttribute('data-name');
                const roleDescription = button.getAttribute('data-description');

                form.action = '{{ route('admin.roles.update', ':id') }}'.replace(':id', roleId);
                form.method = 'POST';
                if (!form.querySelector('input[name="_method"]')) {
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    form.appendChild(methodInput);
                }
                document.getElementById('role_id').value = roleId;
                document.getElementById('name').value = roleName;
                document.getElementById('description').value = roleDescription;
                modalTitle.textContent = 'Cập nhật vai trò';
            } else {
                // Thêm mới vai trò
                form.action = '{{ route('admin.roles.store') }}';
                form.method = 'POST';
                form.querySelectorAll('input[name="_method"]').forEach(el => el.remove());
                document.getElementById('role_id').value = '';
                document.getElementById('name').value = '';
                document.getElementById('description').value = '';
                modalTitle.textContent = 'Thêm vai trò';
            }
        });
    </script>
@endsection
