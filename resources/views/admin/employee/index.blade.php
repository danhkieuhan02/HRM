@extends('admin.layout')

@section('title', 'Danh sách nhân viên')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold">Danh sách nhân viên</h4>
                    <a href="{{ route('admin.employees.create') }}" class="btn btn-outline-light btn-sm fw-medium shadow-sm">
                        <i class="bi bi-plus-lg"></i> Thêm nhân viên
                    </a>
                </div>
            </div>
            <div class="card-body bg-light p-4">
                <!-- Form tìm kiếm -->
                <form action="#" method="GET" class="mb-4">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <div class="input-group" style="max-width: 300px;">
                            <input type="text" name="search" class="form-control" placeholder="Tìm theo tên hoặc mã NV"
                                value="{{ request('search') }}" style="border-radius: 25px 0 0 25px;">
                            <button type="submit" class="btn btn-outline-primary" style="border-radius: 0 25px 25px 0;">
                                <i class="bi bi-search"></i> Tìm kiếm
                            </button>
                        </div>
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-secondary rounded-pill">
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
                                <th scope="col">Mã NV</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Chức vụ</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->employee_code }}</td>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>{{ $employee->position->employee_name ?? 'Chưa có' }}</td>
                                    <td>{{ $employee->start_date }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.employees.edit', ['id' => $employee->employee_code]) }}"
                                                class="btn btn-sm btn-outline-info rounded-pill">
                                                <i class="bi bi-pencil"></i> Sửa
                                            </a>
                                            <a href="#"" class="btn btn-sm btn-outline-danger rounded-pill">
                                                <i class="bi bi-trash"></i> Xóa
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="bi bi-emoji-frown me-2"></i> Không có dữ liệu nhân viên
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
