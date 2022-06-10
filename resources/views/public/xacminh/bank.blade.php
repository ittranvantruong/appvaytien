@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">
            Thẻ ngân hàng
        </h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('verify') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <form action="{{ route('post.bank') }}" method="POST">
        <div class="container">
            <a href="#">Tên chủ thẻ</a>
            <span class="float-end">
                <input type="text" name="name_owner"
                    class="form-control text-end ip_pass"
                    value="{{$user->bank->name_owner}}"
                    @if ($user->bank->name_owner != null)
                    placeholder="{{$user->bank->name_owner}}"
                    @else
                    placeholder="Nhập tên chủ thẻ"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Số chứng minh thư</a>
            <span class="float-end text-muted">
                <input type="number" name="identity_number"
                    class="form-control text-end ip_pass"
                    value="{{$user->bank->identity_number}}"
                    @if ($user->bank->identity_number != null)
                    placeholder="{{$user->bank->identity_number}}"
                    @else
                    placeholder="Nhập chứng minh thư"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Tên ngân hàng</a>
            <span class="float-end text-muted">
                <input type="text" name="name"
                    class="form-control text-end ip_pass"
                    value="{{$user->bank->name}}"
                    @if ($user->bank->name != null)
                    placeholder="{{$user->bank->name}}"
                    @else
                    placeholder="Nhập tên ngân hàng"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Số thẻ</a>
            <span class="float-end">
                <input type="number" name="number"
                    class="form-control text-end ip_pass"
                    value="{{$user->bank->number}}"
                    @if ($user->bank->number != null)
                    placeholder="{{$user->bank->number}}"
                    @else
                    placeholder="Nhập số thẻ"
                    @endif >
            </span>
        </div>

        <div class="m-2">
            <button class="btn btn-full-tim">Xác nhận thông tin</button>
        </div>
    @csrf
    </form>
</main>
@endsection
