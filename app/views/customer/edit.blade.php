@extends('layout.main')
@section('content')
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
@foreach($_SESSION['errors'] as $error)
<span style="color: red;">{{ $error }}</span> <br />
@endforeach
@endif
<h1>Chỉnh sửa khách hàng</h1>
<form action="{{ route('edit-customer/'. $customer->id) }}" method="POST">
    <label for="">Tên khách hàng</label>
    <input type="text" name="ho_ten" value="{{ $customer->ho_ten }}">
    <br>
    <label for="">Email</label>
    <input type="text" name="email" value="{{ $customer->email }}">
    <br>
    <label for="">Số điện thoại</label>
    <input type="text" name="so_dien_thoai" value="{{ $customer->so_dien_thoai }}">
    <br>
    <label for="">Địa chỉ</label>
    <input type="text" name="dia_chi" value="{{ $customer->dia_chi }}">
    <br>
    <input type="submit" name="edit" value="Chỉnh sửa">
</form>
@endsection