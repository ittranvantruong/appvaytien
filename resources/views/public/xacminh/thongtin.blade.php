@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">
            Thông tin</h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('verify') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <form action="{{ route('post.info') }}" method="POST">
        <div class="container">
            <a href="#">Học vấn</a>
            <span class="float-end">
                <input type="text" name="education"
                    class="form-control text-end ip_pass"
                    value="{{$user->info->education}}"
                    @if ($user->info->education != null)
                    placeholder="{{$user->info->education}}"
                    @else
                    placeholder="Nhập học vấn"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Thu nhập cá nhân</a>
            <span class="float-end text-muted">
                <input type="text" name="personal_income"
                    class="form-control text-end ip_pass"
                    value="{{$user->info->personal_income}}"
                    @if ($user->info->personal_income != null)
                    placeholder="{{ $user->info->personal_income }}"
                    @else
                    placeholder="Nhập thu nhập"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Mục đích</a>
            <span class="float-end text-muted">
                <input type="text" name="purpose"
                    class="form-control text-end ip_pass"
                    value="{{$user->info->purpose}}"
                    @if ($user->info->purpose != null)
                    placeholder="{{$user->info->purpose}}"
                    @else
                    placeholder="Mục đích của bạn"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Căn hộ riêng</a>
            <span class="float-end text-muted">
                <input class="form-check-input" type="radio" name="private_apartment" value="1"
                    @if($user->info->private_apartment == 1) checked @endif>
                <label class="form-check-label" for="canhorieng_1">
                    Có
                </label>
                <input class="form-check-input" type="radio" name="private_apartment" value="0" 
                    @if($user->info->private_apartment == 0) checked @endif>
                <label class="form-check-label" for="canhorieng_2">
                    Không
                </label>
            </span>
        </div>

        <div class="container">
            <a href="#">Xe ô tô</a>
            <span class="float-end text-muted">
                <input class="form-check-input" type="radio" name="private_car" value="1"
                    @if($user->info->private_car == 1) checked @endif>
                <label class="form-check-label" for="oto_1">
                    Có
                </label>
                <input class="form-check-input" type="radio" name="private_car" value="0" 
                    @if($user->info->private_car == 0) checked @endif>
                <label class="form-check-label" for="oto_2">
                    Không
                </label>
            </span>
        </div>

        <div class="m-2">
            <button class="btn btn-full-tim">Xác nhận thông tin</button>
        </div>
    @csrf
    </form>
</main>
@endsection
