@extends('public.layouts.master')
@section('title', 'Hồ sơ cá nhân')

@section('content')
<main>
    <p class="p-2"></p>
    <section class="container" id="content_phu">
        <div class="row" id="bkimg_money">
            <div class="col-4">
                <img class="pt-2" src="{{ asset('public/images/dore.png') }}" width="100%">
            </div>
            <div class="col-8 text-end">
                <h5><a href="{{url('/setting')}}"><i class="fa fa-cog" aria-hidden="true"></i></a></h5>
                <p class="p-1"></p>
                <h6><strong>{{$user->info->fullname}}</strong></h6>
                <h6 class="m-0">{{$user->phone}}</h6>
            </div>
        </div>
    </section>
    <p class="p-1"></p>

    <section class="position-relative rounded-0" id="content_main">
        <div class="container pt-1" id="content_tick">
            <div class="row">
                <div class="col-12" style="z-index: 1">
                    <h3 class="px-5 pt-4 text-white">Phiếu miễn lãi <i class="fa fa-gift float-end" aria-hidden="true"></i></h3>
                </div>
                <div class="col-12 position-absolute">
                    <img src="{{ asset('public/images/ticket.png') }}" width="100%" height="80px">
                </div>
            </div>
            <p class="p-2"></p>

            <div class="row">
                <div class="col-12 pb-2">
                    <a href="{{url('/wallet')}}" class="btn btn-tim text-start px-2 fs-14"><i class="fa fa-cog" aria-hidden="true"></i> 
                        {{number_format($user->wallet->amount)}} VNĐ
                        <span class="float-end">Số dư trong ví <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </div>
                <div class="col-12 pb-2">
                    <a href="{{url('/xacminh')}}" class="btn btn-tim text-start px-2 fs-14"><i class="fa fa-cog" aria-hidden="true"></i> 
                        Đã xác nhận
                        <span class="float-end">Xác minh tên thật <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </div>
                <div class="col-12 pb-2">
                    <a href="./vay/khoanvay.html" class="btn btn-tim text-start px-2 fs-14"><i class="fa fa-cog" aria-hidden="true"></i> 
                        <span class="float-end">Khoản vay của tôi <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </div>
                <div class="col-12 pb-2">
                    <a href="./vay/trano.html" class="btn btn-tim text-start px-2 fs-14"><i class="fa fa-cog" aria-hidden="true"></i> 
                        <span class="float-end">Trả nợ của tôi <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </div>
                <div class="col-12 pb-2">
                    <a href="{{url('tuvan')}}" class="btn btn-tim text-start px-2 fs-14"><i class="fa fa-cog" aria-hidden="true"></i> 
                        <span class="float-end">Chăm sóc khách hàng trực tuyến <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </div>
                <div class="col-12 pb-2">
                    <a href="" class="btn btn-tim text-start px-2 fs-14"><i class="fa fa-cog" aria-hidden="true"></i> 
                        
                        <span class="float-end">Câu hỏi thường gặp <i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>


        
    </section>
</main>
@endsection
