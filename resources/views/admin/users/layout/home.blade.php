@push('stylehomeUserAdmin')
    <style>
        #deleteUserModal {
            z-index: 111111;
        }
    </style>
@endpush

<div class="col-8 list-categories">
    <h3>Danh sách tài khoản</h3>
    <hr>

    <div class="wrapper-table p-2">
        <a class="btn btn-dark mb-3" href="{{ route('admin.users.listUsers') }}">Thêm Mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 8%;">STT</th>
                    <th scope="col" style="width: 25%;">Tên tài khoản</th>
                    <th scope="col" style="width: 20%;">Email</th>
                    <th scope="col" style="width: 20%;">Quyền</th>
                    <th scope="col" style="width: 37%;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUsers as $key => $value)
                    <tr>
                        <th scope="row" class="ps-3"> {{ $key + 1 }} </th>
                        <td> {{ $value->name }} </td>
                        <td> {{ $value->email }} </td>
                        <td> {{ $value->role == '1'? 'Admin':'User' }} </td>
                        <td>
                            <a href="  {{ route('admin.users.updateUser', $value->id) }}"
                                class="btn btn-warning">Sửa</a>
                            <button href="" class="btn btn-danger" data-bs-toggle="modal"  data-bs-id="{{ $value->id }}"
                                data-bs-target="#deleteUserModal">Xoá</button>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{ $listUsers->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Xoá -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id="deleteUser" method="POST">
            @method('delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteUserModalLabel">Xoá danh mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn chắc chắn muốn xoá tài khoản này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xoá</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scriptUserAdmin')
    <script>
        var deleteUserModal = document.getElementById('deleteUserModal')
        deleteUserModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('deleteUser')
            formDelete.setAttribute('action', '{{ route('admin.users.deleteUser') }}?idUser=' + id)
        })
    </script>
@endpush
