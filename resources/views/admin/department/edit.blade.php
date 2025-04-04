@extends('admin.layout')

@section('title', 'Chỉnh sửa phòng ban')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i>Chỉnh sửa phòng ban</h4>
                    <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-light btn-sm fw-medium shadow-sm">
                        <i class="bi bi-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>

            <div class="card-body bg-light p-4">
                <form action="{{ route('admin.departments.update', $department->department_code) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <!-- Mã phòng ban (disabled) -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="department_code"
                                    value="{{ $department->department_code }}" placeholder="Mã phòng ban" disabled>
                                <input type="hidden" name="department_code" value="{{ $department->department_code }}">
                                <label for="department_code">Mã phòng ban</label>
                                <small class="text-muted">Không thể thay đổi mã phòng ban</small>
                            </div>
                        </div>

                        <!-- Tên phòng ban -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('DepartmentName') is-invalid @enderror"
                                    id="DepartmentName" name="DepartmentName"
                                    value="{{ old('DepartmentName', $department->DepartmentName) }}"
                                    placeholder="Tên phòng ban" required>
                                <label for="DepartmentName">Tên phòng ban</label>
                                @error('DepartmentName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Địa chỉ -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('Address') is-invalid @enderror"
                                    id="Address" name="Address" value="{{ old('Address', $department->Address) }}"
                                    placeholder="Địa chỉ">
                                <label for="Address">Địa chỉ</label>
                                @error('Address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Số điện thoại -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control @error('PhoneNumber') is-invalid @enderror"
                                    id="PhoneNumber" name="PhoneNumber"
                                    value="{{ old('PhoneNumber', $department->PhoneNumber) }}" placeholder="Số điện thoại">
                                <label for="PhoneNumber">Số điện thoại</label>
                                @error('PhoneNumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Nút submit -->
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm">
                                <i class="bi bi-save me-2"></i> Cập nhật
                            </button>

                            <a href="{{ route('admin.departments.index') }}"
                                class="btn btn-outline-secondary ms-2 px-4 py-2">
                                <i class="bi bi-x-circle me-2"></i> Hủy bỏ
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CSS tùy chỉnh (giống create.blade.php) -->
    <style>
        .form-floating label {
            color: #6c757d;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
        }

        input:disabled {
            background-color: #e9ecef !important;
        }
    </style>
@endsection
