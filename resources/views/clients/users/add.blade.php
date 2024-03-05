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

    <h1>Danh sách người dùng</h1>
    <div class="container-xl">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="fullName">Họ và tên</label>
                <input type="text" class="form-control" placeholder="Tên của bạn" name="fullName" id=""
                    value={{ old('fullName') }}>
                @error('fullName')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email" id=""
                    value={{ old('email') }}>
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Thêm mới</button>
            <a href="btn btn-warning">Quay lại</a>
            @csrf
        </form>
    </div>
    Content
@endsection
