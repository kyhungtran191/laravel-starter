@extends('layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <h1>Danh sách người dùng</h1>
    <a class="btn btn-primary" href="users/add">Thêm người dùng</a>
    <hr>
    @if (session('msg'))
        <div class="alert alert-info">{{ session('msg') }}</div>
    @endif
    <div class="container-xl">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th width="10%">Thời gian</th>
                    <th width="10%">Sửa</th>
                    <th width="10%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($usersList))
                    @foreach ($usersList as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->fullName }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">Sửa</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm">Xóa</a>
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
