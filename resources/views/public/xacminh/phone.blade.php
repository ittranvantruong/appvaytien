@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Điện thoại xác thực</h3>
        <h3 id="button_back"><a class="text-purple" href="{{url('xacminh')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container">
        <a href="#">Số phone</a>
        <span class="float-end text-muted">
            {{$user->phone}}
        </span>
    </div>

    <div class="m-2">
        <a class="btn btn-full-tim" href="{{url('xacminh')}}">Xác nhận thông tin</a>
    </div>
</main>
@endsection
