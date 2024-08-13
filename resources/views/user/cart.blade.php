@extends('user.layouts.default')

@push('style')
@endpush


@section('content')
    <div class="container">
        <h3>Giỏ hàng</h3>

        <form action="{{route('user.updateCart')}}" method="post">
            @method('patch')
            @csrf

            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $tongTien = 0;
                    @endphp
                    @foreach ($cart->cart_details as $key => $value)
                        @php
                            $thanhTien = intval($value->product->price) * intval($value->quantity);
                            $tongTien += $thanhTien;
                        @endphp
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                @foreach ($value->product->images as $image)
                                    @if ($image->image_type == 'main')
                                        <img src="{{ asset($image->image_url) }}" alt="Product Image" width="50"
                                            height="50" style="object-fit: cover;">
                                    @endif
                                @endforeach
                                {{ $value->product->name }}
                            </td>
                            <td> {{ $value->product->category->name }} </td>
                            <td style="width:20%;">
                                <input type="number" class="form-control" name='quantity[]'value="{{ $value->quantity }}">
                                <input type="hidden" value="{{$value->id}}" name='idCartDetail[]'>
                            </td>
                            <td> {{ number_format($value->product->price, 0, '.', '.') . ' VNĐ' }} </td>
                            <td>@php echo number_format($thanhTien, 0, '.', '.') .' VNĐ' @endphp </td>
                            <td>
                                {{-- thanh toán --}}
                                <a href="" class="btn btn border">
                                    <i class="fa-solid fa-cart-arrow-down fa-lg" style="color: #000000;"></i>
                                </a>
                                {{-- sửa --}}
                                <button type="submit" class="btn btn border">
                                    <i class="fa-regular fa-pen-to-square fa-xl" style="color: #000000;"></i>
                                </button>
                                {{-- xoá --}}
                                <a class="btn btn border"><i class="fa-regular fa-trash-can fa-xl"
                                  data-bs-toggle="modal" data-bs-target="#deleteCart" data-bs-id="{{ $value->id }}" style="color: #000000;"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            @error('quantity.*')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td></td>
                        <td>Tổng tiền: @php echo number_format($tongTien, 0, '.', '.') .' VNĐ'  @endphp</td>
                        <td> <a href="#" class="btn btn-dark">Thanh toán</a></td>
                    </tr>
                </tbody>

            </table>
        </form>
        <div class="wrapper-btn text-end"><a href="{{route('user.product.listProductsUser')}}" class="btn btn-danger">Trở lại trang mua hàng</a></div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade" id="deleteCart" tabindex="-1" aria-labelledby="#deleteCartModel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteCartModel">Thông báo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="formDeleteCart">
                @method('delete')
                @csrf
                <div class="modal-body">
                    Bạn có muốn xoá không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xoá</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var deleteCart = document.getElementById('deleteCart')
        deleteCart.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id')
        let formDelete = document.getElementById('formDeleteCart')
        formDelete.setAttribute('action','{{ route("user.deleteCart") }}?idCartDetail=' + id)
    })
    </script>
@endpush
