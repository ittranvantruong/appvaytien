@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Rút tiền</h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('profile.index') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container">
        <div class="alert alert-light">
            <h4><span>Số dư:</span><b class="text-danger"> {{number_format($user->wallet->amount)}}</b></h4>
        </div>
        <hr>
        <div class="alert alert-light">
            <p><a class="btn btn-primary">Liên hệ để lấy mật khẩu rút tiền</a></p>
           
        </div>
        <hr>
        <div class="alert alert-light">
            <h5 class="text-center">
                Xác nhận rút tiền
            </h5>
            <div class="form">
                <form  action="" method="post">
                    @csrf

                    <div class="form-group py-2">
                        <label for="">Nhập số tiền cần rút</label>
                        <input type="number" max="{{$user->wallet->amount}}" class="form-control" name="amount" placeholder="Nhập số tiền cần rút" required>
                    </div>
                    <div class="form-group py-2">
                        <label for="">Nhập mật khẩu rút tiền</label>
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu rút tiền" name="password_show" required>
                    </div>
                    <div class="form-group text-center py-2">
                        <button class="btn btn-full-tim" type="submit">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="m-2">
    </div>
</main>
@endsection
