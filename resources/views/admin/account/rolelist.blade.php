@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Danh sách vai trò</h3>
            <div class="mb-3 text-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                    <i class="bi bi-plus"></i> Thêm vai trò
                </button>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>STT</th>
                        <th>Tên vai trò</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->RoleID }}</td>
                            <td>{{ $role->RoleName }}</td>
                            <td>{{ $role->Description }}</td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-outline-primary btn-sm edit-role" data-id="{{ $role->id }}"
                                        data-name="{{ $role->name }}" data-bs-toggle="modal"
                                        data-bs-target="#addRoleModal">
                                        <i class="bi bi-pencil"></i> Cập nhật
                                    </button>
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc muốn xóa vai trò này?')">
                                            <i class="bi bi-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Thêm/Cập nhật vai trò -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoleModalLabel">Thêm vai trò</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="roleForm" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="role_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên vai trò</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Reset form khi mở modal để thêm mới
        document.getElementById('addRoleModal').addEventListener('show.bs.modal', function(event) {
            if (!event.relatedTarget.classList.contains('edit-role')) {
                const form = document.getElementById('roleForm');
                form.action = '{{ route('admin.roles.store') }}';
                form.method = 'POST';
                form.querySelectorAll('input[name="_method"]').forEach(el => el.remove());
                document.getElementById('role_id').value = '';
                document.getElementById('name').value = '';
                document.getElementById('description').value = '';
                document.getElementById('addRoleModalLabel').textContent = 'Thêm vai trò';
            }
        });
    </script>
@endsection
