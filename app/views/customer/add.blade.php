@extends('layout.main')
@section('content')
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
@foreach($_SESSION['errors'] as $error)
<span style="color: red;">{{ $error }}</span> <br />
@endforeach
@endif
<h1>Thêm mới khách hàng</h1>
<form action="{{ route('post-customer') }}" method="POST">
    <label for="">Tên khách hàng</label>
    <input type="text" name="ho_ten">
    <br>
    <label for="">Email</label>
    <input type="text" name="email">
    <br>
    <label for="">Số điện thoại</label>
    <input type="text" name="so_dien_thoai">
    <br>
    <label for="">Địa chỉ</label>
    <input type="text" name="dia_chi">
    <br>
    <input type="submit" name="add" value="Thêm mới">
</form>
@endsection