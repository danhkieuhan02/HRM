@extends('admin.layout')

@section('title', 'Thêm phòng ban mới')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-building me-2"></i>Thêm phòng ban mới</h4>
                    <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-light btn-sm fw-medium shadow-sm">
                        <i class="bi bi-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>

            <div class="card-body bg-light p-4">
                <form action="{{ route('admin.departments.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <!-- Mã phòng ban -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('department_code') is-invalid @enderror"
                                    id="department_code" name="department_code" value="{{ old('department_code') }}"
                                    placeholder="Mã phòng ban" required>
                                <label for="department_code">Mã phòng ban</label>
                                @error('department_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tên phòng ban -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('DepartmentName') is-invalid @enderror"
                                    id="DepartmentName" name="DepartmentName" value="{{ old('DepartmentName') }}"
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
                                    id="Address" name="Address" value="{{ old('Address') }}" placeholder="Địa chỉ">
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
                                    id="PhoneNumber" name="PhoneNumber" value="{{ old('PhoneNumber') }}"
                                    placeholder="Số điện thoại">
                                <label for="PhoneNumber">Số điện thoại</label>
                                @error('PhoneNumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Nút submit -->
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm">
                                <i class="bi bi-save me-2"></i> Lưu thông tin
                            </button>

                            <button type="reset" class="btn btn-outline-secondary ms-2 px-4 py-2">
                                <i class="bi bi-arrow-counterclockwise me-2"></i> Nhập lại
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CSS tùy chỉnh -->
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
    </style>
@endsection
