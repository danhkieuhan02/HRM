@extends('admin.layout')

@section('scripts')
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Danh sách người dùng</h3>
            <div class="mb-3 text-end">
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bi bi-plus"></i> Thêm tài khoản
                </button>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>STT</th>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->IsAdmin }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="#" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-pencil"></i> Cập nhật
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i> Xóa
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal Thêm/Cập nhật tài khoản -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Thêm tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm" action="#" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="user_id"> <!-- Trường ẩn để lưu id -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
                        </div>
                        <div class="mb-3">
                            <label for="is_admin" class="form-label">Vai trò</label>
                            <select class="form-select" id="is_admin" name="is_admin" required>
                                <option value="0">Người dùng thường</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.btn-outline-primary').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const row = this.closest('tr');
                const id = row.querySelector('td:nth-child(1)').textContent;
                const name = row.querySelector('td:nth-child(2)').textContent;
                const email = row.querySelector('td:nth-child(3)').textContent;
                const isAdmin = row.querySelector('td:nth-child(4)').textContent;

                document.getElementById('user_id').value = id;
                document.getElementById('name').value = name;
                document.getElementById('email').value = email;
                document.getElementById('is_admin').value = isAdmin;
                document.getElementById('password').value = ''; // Để trống mật khẩu khi cập nhật

                new bootstrap.Modal(document.getElementById('addUserModal')).show();
            });
        });
    </script>
@endsection
