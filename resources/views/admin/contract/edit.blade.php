@extends('admin.layout')

@section('title', 'Chỉnh sửa hợp đồng')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg" style="border: none; border-radius: 15px; overflow: hidden;">
            <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold">Chỉnh sửa hợp đồng - {{ $contract->contract_code }}</h4>
                    <a href="{{ route('admin.contracts.index') }}" class="btn btn-outline-light btn-sm fw-medium shadow-sm">
                        <i class="bi bi-arrow-left"></i> Quay lại danh sách
                    </a>
                </div>
            </div>
            <div class="card-body bg-light p-4">
                <!-- Form chỉnh sửa hợp đồng -->
                <form action="{{ route('admin.contracts.update', $contract->contract_code) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Mã hợp đồng -->
                        <div class="col-md-6 mb-3">
                            <label for="contract_code" class="form-label fw-medium">Mã hợp đồng <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-pill" id="contract_code" name="contract_code"
                                value="{{ old('contract_code', $contract->contract_code) }}" required readonly>
                            @error('contract_code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Loại hợp đồng -->
                        <div class="col-md-6 mb-3">
                            <label for="ContractType" class="form-label fw-medium">Loại hợp đồng <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control rounded-pill" id="ContractType" name="ContractType"
                                value="{{ old('ContractType', $contract->ContractType) }}" required>
                            @error('ContractType')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Ngày bắt đầu -->
                        <div class="col-md-6 mb-3">
                            <label for="StartDate" class="form-label fw-medium">Ngày bắt đầu <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control rounded-pill" id="StartDate" name="StartDate"
                                value="{{ old('StartDate', $contract->StartDate) }}" required>
                            @error('StartDate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Ngày kết thúc -->
                        <div class="col-md-6 mb-3">
                            <label for="EndDate" class="form-label fw-medium">Ngày kết thúc</label>
                            <input type="date" class="form-control rounded-pill" id="EndDate" name="EndDate"
                                value="{{ old('EndDate', $contract->EndDate) }}">
                            @error('EndDate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Ghi chú -->
                        <div class="col-12 mb-3">
                            <label for="Note" class="form-label fw-medium">Ghi chú</label>
                            <textarea class="form-control rounded" id="Note" name="Note" rows="4">{{ old('Note', $contract->Note) }}</textarea>
                            @error('Note')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Nút hành động -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-save me-2"></i> Cập nhật hợp đồng
                        </button>
                        <a href="{{ route('admin.contracts.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="bi bi-x-circle me-2"></i> Hủy
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
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        .btn-outline-primary {
            border-color: #4e73df;
            color: #4e73df;
        }

        .btn-outline-primary:hover {
            background: #4e73df;
            color: white;
            border-color: #4e73df;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }

        .text-danger {
            font-size: 0.9rem;
        }
    </style>
@endsection
