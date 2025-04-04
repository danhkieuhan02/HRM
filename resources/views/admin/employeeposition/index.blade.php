@extends('admin.layout')

@section('title', 'Quản lý chức vụ nhân viên')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-person-badge me-2"></i>Danh sách chức vụ</h4>
                    <button type="button" class="btn btn-outline-light btn-sm fw-medium shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#positionModal">
                        <i class="bi bi-plus-lg"></i> Thêm chức vụ
                    </button>
                </div>
            </div>
            <div class="card-body bg-light p-4">
                <!-- Bảng dữ liệu -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered"
                        style="background: white; border-radius: 10px; overflow: hidden;">
                        <thead style="background: #343a40; color: white;">
                            <tr>
                                <th width="20%">Mã chức vụ</th>
                                <th>Tên chức vụ</th>
                                <th width="15%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($positions as $position)
                                <tr>
                                    <td>{{ $position->employee_position_code }}</td>
                                    <td>{{ $position->employee_name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-info rounded-pill edit-btn"
                                                data-id="{{ $position->employee_position_code }}"
                                                data-code="{{ $position->employee_position_code }}"
                                                data-name="{{ $position->employee_name }}" data-bs-toggle="modal"
                                                data-bs-target="#positionModal">
                                                <i class="bi bi-pencil"></i> Sửa
                                            </button>
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa chức vụ này?')">
                                                    <i class="bi bi-trash"></i> Xóa
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">
                                        <i class="bi bi-emoji-frown me-2"></i> Không có dữ liệu chức vụ
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm/Sửa -->
    <div class="modal fade" id="positionModal" tabindex="-1" aria-labelledby="positionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-white" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                    <h5 class="modal-title" id="positionModalLabel"><i class="bi bi-person-badge me-2"></i><span
                            id="modalTitle">Thêm chức vụ mới</span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="positionForm" method="POST">
                    @csrf
                    <div id="methodInput"></div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="employee_position_code" class="form-label">Mã chức vụ</label>
                            <input type="text" class="form-control" id="employee_position_code"
                                name="employee_position_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="employee_name" class="form-label">Tên chức vụ</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i> Đóng
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-2"></i> Lưu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript xử lý modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('positionModal');
            const modalTitle = document.getElementById('modalTitle');
            const form = document.getElementById('positionForm');
            const methodInput = document.getElementById('methodInput');
            const codeInput = document.getElementById('employee_position_code');
            const nameInput = document.getElementById('employee_name');

            // Xử lý khi mở modal thêm mới
            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Nếu là nút sửa
                if (button.classList.contains('edit-btn')) {
                    modalTitle.textContent = 'Chỉnh sửa chức vụ';
                    codeInput.value = button.dataset.code;
                    nameInput.value = button.dataset.name;

                    // Thêm input ẩn cho method PUT
                    methodInput.innerHTML = '<input type="hidden" name="_method" value="PUT">';

                    // Cập nhật action form
                    form.action = `/admin/employee_positions/${button.dataset.id}`;
                }
                // Nếu là nút thêm mới
                else {
                    modalTitle.textContent = 'Thêm chức vụ mới';
                    codeInput.value = '';
                    nameInput.value = '';
                    methodInput.innerHTML = '';
                    form.action = '/admin/employee_positions';
                }
            });

            // Reset form khi modal đóng
            modal.addEventListener('hidden.bs.modal', function() {
                form.reset();
            });
        });
    </script>

    <!-- CSS tùy chỉnh -->
    <style>
        form:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease-in-out;
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
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background: #dc3545;
            color: white;
        }

        .modal-header {
            border-radius: 0;
        }
    </style>
@endsection
