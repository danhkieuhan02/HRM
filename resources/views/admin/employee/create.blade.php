@extends('admin.layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <h4 class="card-title mb-0 fw-bold">Thêm mới nhân viên</h4>
            </div>
            <div class="card-body bg-light p-4">
                <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Thông tin cơ bản -->
                    <h5 class="mt-2 mb-3 text-primary fw-semibold">Thông tin cơ bản</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="employee_code" class="form-label fw-medium">Mã nhân viên <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-pill" id="employee_code" name="employee_code"
                                maxlength="20" value="{{ old('employee_code') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="full_name" class="form-label fw-medium">Họ và tên <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-pill" id="full_name" name="full_name"
                                maxlength="100" value="{{ old('full_name') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="birthday" class="form-label fw-medium">Ngày sinh</label>
                            <input type="date" class="form-control rounded-pill" id="birthday" name="birthday"
                                value="{{ old('birthday') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label fw-medium">Giới tính</label>
                            <select class="form-select rounded-pill" id="gender" name="gender">
                                <option value="">Chọn giới tính</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Nam</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Nữ</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Khác</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label fw-medium">Ảnh</label>
                            <input type="file" class="form-control rounded-pill" id="image" name="image">
                        </div>
                    </div>

                    <!-- Thông tin cá nhân -->
                    <h5 class="mt-5 mb-3 text-primary fw-semibold">Thông tin cá nhân</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="phone_number" class="form-label fw-medium">Số điện thoại</label>
                            <input type="text" class="form-control rounded-pill" id="phone_number" name="phone_number"
                                maxlength="15" value="{{ old('phone_number') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="hometown" class="form-label fw-medium">Quê quán</label>
                            <input type="text" class="form-control rounded-pill" id="hometown" name="hometown"
                                maxlength="255" value="{{ old('hometown') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="ethnic" class="form-label fw-medium">Dân tộc</label>
                            <input type="text" class="form-control rounded-pill" id="ethnic" name="ethnic"
                                maxlength="50" value="{{ old('ethnic') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-medium">Trạng thái</label>
                            <input type="text" class="form-control rounded-pill" id="status" name="status"
                                maxlength="20" value="{{ old('status') }}">
                        </div>
                    </div>

                    <!-- Thông tin công việc -->
                    <h5 class="mt-5 mb-3 text-primary fw-semibold">Thông tin công việc</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="department_code" class="form-label fw-medium">Phòng ban</label>
                            <select class="form-select rounded-pill" id="department_code" name="department_code">
                                <option value="">Chọn phòng ban</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_code }}"
                                        {{ old('department_code') == $department->department_code ? 'selected' : '' }}>
                                        {{ $department->DepartmentName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="employee_position_code" class="form-label fw-medium">Chức vụ</label>
                            <select class="form-select rounded-pill" id="employee_position_code"
                                name="employee_position_code">
                                <option value="">Chọn chức vụ</option>
                                @foreach ($employee_positions as $position)
                                    <option value="{{ $position->employee_position_code }}"
                                        {{ old('employee_position_code') == $position->employee_position_code ? 'selected' : '' }}>
                                        {{ $position->employee_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="contract_code" class="form-label fw-medium">Hợp đồng</label>
                            <select class="form-select rounded-pill" id="contract_code" name="contract_code">
                                <option value="">Chọn hợp đồng</option>
                                @foreach ($contracts as $contract)
                                    <option value="{{ $contract->contract_code }}"
                                        {{ old('contract_code') == $contract->contract_code ? 'selected' : '' }}>
                                        {{ $contract->ContractType }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="education_level_code" class="form-label fw-medium">Trình độ học vấn</label>
                            <select class="form-select rounded-pill" id="education_level_code"
                                name="education_level_code">
                                <option value="">Chọn trình độ học vấn</option>
                                @foreach ($education_levels as $educationLevel)
                                    <option value="{{ $educationLevel->education_level_code }}"
                                        {{ old('education_level_code') == $educationLevel->education_level_code ? 'selected' : '' }}>
                                        {{ $educationLevel->education_level_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Nút điều hướng -->
                    <div class="mt-5 d-flex gap-3">
                        <button type="submit" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-save me-2"></i>Lưu
                        </button>
                        <a href="{{ route('admin.employees.index') }}"
                            class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-x-lg me-2"></i>Hủy
                        </a>
                    </div>
                </form>
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

        .form-control,
        .form-select {
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
        }

        .btn-primary {
            background: #4e73df;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #224abe;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }

        h5.text-primary {
            border-bottom: 2px solid #4e73df;
            padding-bottom: 5px;
            display: inline-block;
        }
    </style>
@endsection
