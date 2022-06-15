@extends('public.layouts.master')
@section('title', 'Khoản vay của tôi')
@push('css')
<link rel="stylesheet" href="{{ asset('public/css/setting.css') }}">
<style>
    body{
        overflow: auto;
    }
</style>
@endpush
@section('content')
<header class="position-relative p-0">
    <h3 class="text-center text-uppercase text-purple p-3">Khoản vay của tôi</h3>
    <h3 id="button_back"><a class="text-purple" href="{{ route('profile.index') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
</header>
<div class="container" style="height: 1000px;">
    @forelse($user_loan_amount as $item)
        @include('public.loan_amount.card', ['item' => $item])
    @empty
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info">
                <p class="text-center text-muted">Không có khoản vay nào</p>
            </div>
        </div>
    @endforelse
</div>

@endsection
