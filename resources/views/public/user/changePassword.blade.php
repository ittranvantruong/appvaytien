@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Đổi mật khẩu</h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('setting.index') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <form action="{{ route('update.change.password') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="container">
            <a>Mật khẩu cũ</a>
            <span class="float-end">
                <input type="password" name="password"
                    class="form-control text-end ip_pass"
                    placeholder="Nhập mật khẩu cũ" required>
            </span>
        </div>

        <div class="container">
            <a>Mật khẩu mới</a>
            <span class="float-end">
                <input type="password" name="new_password"
                    class="form-control text-end ip_pass"
                    placeholder="Nhập lại mật khẩu mới" required>
            </span>
        </div>

        <div class="container">
            <a>Xác nhận mật khẩu
                <span class="float-end">
                    <input type="password" name="new_password_confirmation"
                        class="form-control text-end ip_pass"
                        placeholder="Xác nhận mật khẩu" required>
                </span>
            </a>
        </div>
        <div class="p-2">
            <button type="submit" class="btn btn-full-tim">Đổi mật khẩu</button>
        </div>
    </form>
</main>
@endsection
