@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Thông tin cá nhân</h3>
        <h3 id="button_back"><a class="text-purple" href="{{url('xacminh')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <form action="{{ url('info_canhan')}}" method="POST">
        <div class="container">
            <a href="#">Tên thật</a>
            <span class="float-end">
                <input type="text" name="fullname"
                    class="form-control text-end ip_pass"
                    value="{{$user->info->fullname}}"
                    @if ($user->info->fullname != null)
                    placeholder="{{$user->info->fullname}}"
                    @else
                    placeholder="Nhập tên thật"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Email</a>
            <span class="float-end">
                <input type="text" name="email"
                    class="form-control text-end ip_pass"
                    value="{{$user->email}}"
                    @if ($user->email != null)
                    placeholder="{{$user->email}}"
                    @else
                    placeholder="Nhập email"
                    @endif >
            </span>
        </div>

        <div class="container">
            <a href="#">Số CMND</a>
            <span class="float-end">
                <input type="number" name="identity_number"
                    class="form-control text-end ip_pass"
                    value="{{$user->info->identity_number}}"
                    @if ($user->info->identity_number != null)
                    placeholder="{{$user->info->identity_number}}"
                    @else
                    placeholder="Nhập số CMND"
                    @endif >
            </span>
        </div>

        <div class="m-2">
            <button type="submit" class="btn btn-full-tim">Xác nhận thông tin</button>
        </div>
    @csrf
    </form>
</main>
@endsection
