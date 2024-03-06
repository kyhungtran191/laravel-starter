@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu thêm vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif

    <h1>Sửa Sản phẩm</h1>
    <div class="container-xl">
        <form action="{{ route('products.postEdit') }}" method="POST">
            <div class="mb-3">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="name" id=""
                    value={{ old('name') ?? $product->name }}>
                @error('name')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="text" class="form-control" placeholder="Price product" name="price" id=""
                    value={{ old('price') ?? $product->price }}>
                @error('price')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                @if (!empty($listCategories))
                    <select style="width: 30%;" name="category" defaultValue="{{ old('category') || $product->id }}">
                        @foreach ($listCategories as $category)
                            {
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            }
                        @endforeach
                    </select>
                @endif
                @error('caegory')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <select name="status" style="width: 30%;" defaultValue="{{ old('status') || $product->status }}">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                @error('status')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-warning">Quay lại</a>
            @csrf
        </form>
    </div>
    Content
@endsection
