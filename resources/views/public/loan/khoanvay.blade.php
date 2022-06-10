@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">
            Khoản vay của tôi
        </h3>
        <h3 id="button_back"><a class="text-purple" href="{{url('hoso')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container" style="height: 1000px;">
    @foreach($user_loan_amount as $value)
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
                            @if($value->status == 1)
                                Xét duyệt thành công
                            @elseif ($value->status == 0)
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
                        Hạn mức khoản vay
                        <span class="float-end">{{ $value->loan_amount }}</span>
                    </p>
                    <p class="text-muted">
                        Thời hạn khoản vay
                        <span class="float-end">{{ $value->loan_period }}</span>
                    </p>
                    <p class="text-muted">
                        Lãi suất tháng
                        <span class="float-end">{{ $value->interest_rate }}%</span>
                    </p>
                    <p class="text-muted">
                        Thời gian đăng ký
                        <span class="float-end">{{ $value->created_at->format('Y-m-d')}}</span>
                    </p>
                </div>

                <div class="row pt-3 pb-3" id="foot_khoanvay">
                    <div class="col-6">
                        <p class="m-0"><a href="#" class="text-white">
                            <i class="fa fa-file-o" aria-hidden="true"></i> 
                            Xem hợp đồng</a></p>
                    </div>
                    <div class="col-6 text-end">
                        <p class="text-white m-0"><a href="#" class="text-white">
                            Chi tiết thành viên 
                            <i class="fa fa-file-o" aria-hidden="true"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
    @endforeach
    </div>
</main>
@endsection
