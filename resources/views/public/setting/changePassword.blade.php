@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Đổi mật khẩu</h3>
        <h3 id="button_back"><a class="text-purple" href="{{url('./setting')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <form method="POST" action="{{url('password')}}">
        <div class="container">
            <a>Mật khẩu cũ</a>
            <span class="float-end">
                <input type="password" name="mkcu"
                    class="form-control text-end ip_pass"
                    placeholder="Nhập mật khẩu cũ">
            </span>
        </div>

        <div class="container">
            <a>Mật khẩu mới</a>
            <span class="float-end">
                <input type="password" name="mkmoi"
                    class="form-control text-end ip_pass"
                    placeholder="Nhập lại mật khẩu mới">
            </span>
        </div>

        <div class="container">
            <a>Xác nhận mật khẩu
                <span class="float-end">
                    <input type="password" name="nhaplai"
                        class="form-control text-end ip_pass"
                        placeholder="Xác nhận mật khẩu">
                </span>
            </a>
        </div>
        <div class="p-2">
            <button type="submit" class="btn btn-full-tim">Đổi mật khẩu</button>
        </div>
    @csrf
    </form>
</main>
@endsection
