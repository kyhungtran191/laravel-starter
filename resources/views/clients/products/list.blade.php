@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>Danh sách Sản phẩm</h1>
    <a class="btn btn-primary" href="{{ route('products.getAdd') }}">Thêm sản phẩm</a>
    <hr>
    @if (session('msg'))
        <div class="alert alert-info">{{ session('msg') }}</div>
    @endif
    <div class="container-xl">
        <form action="" class="mb-4">
            @if (!empty($listCategories))
                <select style="width: 30%;" name="category">
                    <option value="0">Chọn theo loại sản phẩm</option>
                    @foreach ($listCategories as $category)
                        {
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        }
                    @endforeach
                </select>
            @endif
            <select name="status" style="width: 30%;">
                <option value="_">Chọn theo status</option>
                <option value="0">Inactive</option>
                <option value="1">Active</option>
            </select>
            <input type="text" name="keywords" placeholder="Search Product">
            <button class="btn btn-primary">Tìm kiếm</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th width="10%">Sửa</th>
                    <th width="10%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($listProduct))
                    @foreach ($listProduct as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>
                                <a href="products/edit/{{ $product->id }}" class="btn btn-warning btn-sm">Sửa</a>
                            </td>
                            <td>
                                <a href="products/delete/{{ $product->id }}" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>No users data</tr>
                @endif
            </tbody>
        </table>
    </div>
    Content
@endsection
