@push('stylehomeCategory')
    <style>
        #deleteCategoryModal {
            z-index: 111111;
        }
    </style>
@endpush

<div class="col-7 list-categories ms-3">
    <h3>Danh sách danh mục</h3>
    <hr>

    <div class="wrapper-table p-2">
        <a class="btn btn-dark mb-3" href="{{ route('admin.categories.listCategories') }}">Thêm Mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 38%;">STT</th>
                    <th scope="col" style="width: 38%;">Tên danh mục</th>
                    <th scope="col" style="width: 20%;">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCategories as $key => $value)
                    <tr>
                        <th scope="row" class="ps-3"> {{ $key + 1 }} </th>
                        <td class="ps-4"> {{ $value->name }} </td>
                        <td>
                            <a href="{{ route('admin.categories.updateCategory', $value->id) }}"
                                class="btn btn-warning">Sửa</a>
                            <button href="" class="btn btn-danger" data-bs-toggle="modal"  data-bs-id="{{ $value->id }}"
                                data-bs-target="#deleteCategoryModal">Xoá</button>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>

<!-- Xoá -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id="formDeleteCategory" method="POST">
            @method('delete')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Xoá danh mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn chắc chắn muốn xoá danh mục này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xoá</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scriptCtgr')
    <script>
        var deleteCategoryModal = document.getElementById('deleteCategoryModal')
        deleteCategoryModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')

            let formDelete = document.getElementById('formDeleteCategory')
            formDelete.setAttribute('action', '{{ route('admin.categories.deleteCategory') }}?idCategory=' + id)
        })
    </script>
@endpush
