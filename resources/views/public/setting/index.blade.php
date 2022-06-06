@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Cài đặt</h3>
        <h3 id="button_back"><a class="text-purple" href="../hoso.html"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    <div class="container">
        <a href="./change_password.html">
            <div class="row">
                <span>Thay đổi mật khẩu đăng nhập 
                    <span class="text-muted float-end">
                        <i class="fa fa-chevron-right"></i></span>
                </span>
            </div>
        </a>
    </div>
    
    <div class="container">
        <a href="./about_us.html">
            <div class="row">
                <span>Về chúng tôi<span class="text-muted float-end">
                    <i class="fa fa-chevron-right"></i></span></span>
            </div>
        </a>
    </div>
    
    <div class="container">
        <a href="#">Số hiện tại <span class="float-end">V1.1.0</span></a>
    </div>
    
    <div class="container">
        <a href="#">
            <div class="row">
                <span>Đăng xuất<span class="text-muted float-end">
                    <i class="fa fa-chevron-right"></i></span></span>
            </div>
        </a>
    </div>
</main>
@endsection
