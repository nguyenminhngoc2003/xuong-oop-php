@extends('layout.main')
@section('content')
<a href="{{ route('add-customer') }}">Thêm mới</a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Action</th>

    </thead>
    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->ho_ten }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->so_dien_thoai }}</td>
            <td>{{ $customer->dia_chi }}</td>
            <th>
                <a href="{{ route('detail-customer/'.$customer->id) }}">Sửa</a>
                <a href="{{ route('delete-customer/'.$customer->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
            </th>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection