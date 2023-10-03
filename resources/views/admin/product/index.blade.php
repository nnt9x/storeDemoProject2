@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary mb-3" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">Thêm
                sản phẩm
            </button>

            <form action="{{route('admin-product-search')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Search</span>
                    <input value="{{ $keyword ?? ''  }}" autocomplete="off" name="keyword" type="text"
                           class="form-control" placeholder="Nhập từ khoá cần tìm"
                           aria-label="Username"
                           aria-describedby="basic-addon1">
                </div>
                <button type="submit" hidden></button>
            </form>
            {{--  Bang san pham--}}
            <table class="text-center table table-striped table-responsive table-bordered">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Gía</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <p>{{$product->name}}</p>
                            <a href="{{route('admin-product-detail',['id'=> $product->id])}}">
                                <img style="height: 150px" class="img-fluid" src="{{$product->image}}"/>
                            </a>
                        </td>
                        <th>
                            {{number_format($product->price)}} VND
                        </th>
                        <th>
                            {{$product->quantity}}
                        </th>
                        <td>
                            <form method="POST" action="{{route('admin-product-delete')}}">
                                @csrf
                                <input name="productId" hidden value="{{$product->id}}"/>
                                <button class="btn btn-danger text-white" title="Xoá">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Không có sản phẩm nào</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm sản phẩm mới</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" method="POST" action="{{route('admin-product-create')}}">
                    @csrf
                    <div class="modal-body">
                        <input class="form-control mb-3" name="productCode" placeholder="Mã sản phẩm">
                        <input class="form-control mb-3" name="productName" placeholder="Tên sản phẩm">
                        <input class="form-control mb-3" name="productImage" placeholder="Link sản phẩm">
                        <input type="number" min="0" class="form-control mb-3" name="productPrice"
                               placeholder="Giá sản phẩm">
                        <input type="number" min="0" step="1" class="form-control mb-3" name="productQuantity"
                               placeholder="Số lượng sản phẩm">

                        <select name="productBrandId" class="form-select mb-3">
                            <option>Nhập lựa chọn...</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                        <textarea class="form-control" name="productDescription"
                                  placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
