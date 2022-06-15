@extends('public.layouts.master')
@section('title', 'Tư vấn')

@section('content')
<main>
    <p class="p-2"></p>
    <section class="container banner text-center">
        <h3 class="text-center text-white">Chăm sóc khách hàng</h3>
        <img src="{{ asset('public/images/dore.png') }}" style="position: absolute; left: 25%; top: 15%;" width="50%">
        <p style="padding: 125px"></p>
        <h4 class="text-white fw-bold">Zalo chăm sóc khách hàng</h4>
        <h6 class="text-white">Thời gian phục vụ</h6>
        <h6 class="text-white">Hằng ngày từ 09:00 đến 21:00</h6>
        <p></p>
        <a class="btn btn-tim text-center text-dark" href="https://zalo.me/{{ optional($zalo)->plain_value }}" target="_blank" style="width: 25%">
            <i class="fa fa-arrow-right" style="font-size: 24px"></i>
        </a>
    </section>
</main>
@endsection
