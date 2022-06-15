@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Về chúng tôi</h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('setting.index') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container" style="height: 1000px;">
        {!! $aboutus->plain_value !!}
    </div>
</main>
@endsection
