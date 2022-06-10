@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">
            Khoản nợ của tôi
        </h3>
        <h3 id="button_back"><a class="text-purple" href="{{url('hoso')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container" style="height: 1000px;">
    @foreach ($user_loan_amount as $value)
    @foreach ($value->repayment as $v)
        <div class="card" style="width: 100%">
            <div class="card-body" style="padding-bottom: 0px; padding-left: 11px; padding-right: 11px;">
                <div class="row" id="title_khoanvay">
                    <p class="text-muted m-0">
                        <i class="fa fa-flag-o fs-20"></i> mã số khoản vay
                        <span class="float-end"><i class="fa fa-grav fs-20"></i></span>
                    </p>
                    <p class="text-muted m-0">
                        {{ $value->code }}
                        <span class="float-end text-purple">
                            @if($v->status == 1)
                                Xét duyệt thành công
                            @elseif ($v->status == 0)
                                Chờ duyệt
                            @else 
                                Từ chối
                            @endif
                        </span>
                    </p>
                </div>
                <hr>
                <div class="row">
                    <p class="text-muted">
                        Thời gian hoàn trả
                        <span class="float-end">{{ $v->created_at->format('Y-m-d')}}</span>
                    </p>
                    <p class="text-muted">
                        Mức hoàn trả
                        <span class="float-end">{{ $v->amount }}</span>
                    </p>
                    <p class="text-muted">
                        Phương thức hoàn trả
                        <span class="float-end">{{ $v->method}}</span>
                    </p>
                </div>

            </div>
        </div>
        <p></p>
    @endforeach
    @endforeach
    </div>
</main>
@endsection
