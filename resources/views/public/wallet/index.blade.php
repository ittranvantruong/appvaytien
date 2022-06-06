@extends('public.layouts.master')
@section('title', 'Ví của tôi')
@section('content')
<main>
    <p class="p-2"></p>
    <section class="container" id="content_phu">
        <div class="row" id="bkimg_money">
            <div class="col-4">
                <img class="pt-2" src="{{ asset('public/images/dore.png') }}" width="100%">
            </div>
            <div class="col-8 text-center">
                <h6><strong>Số dư tài khoản(đồng)</strong></h6>
                <h5 class="m-0"><i class="fa fa-money" aria-hidden="true"></i> 1.200.000.000</h5>
                <p></p>
                <a class="btn btn-tim text-dark" style="width:50%">Rút tiền ngay</a>
            </div>
        </div>
    </section>
    <p class="p-1"></p>

    <section class="position-relative" id="content_main">
        <div class="container">
            <h5 class="text-center">Thẻ ngân hàng của tôi</h5>
            <img src="{{ asset('public/images/visa.png') }}" width="100%" height="150px">
            <p class="text-center text-purple"><i class="fa fa-shield" aria-hidden="true"></i>
                Sự an toàn của quỹ tài khoản được ngân hàng đảm bảo
            </p>
            <h5 class="text-center">Tiến độ rút tiền</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Thời gian rút tiền</th>
                        <th>Không có</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Số tiền rút</th>
                        <th>Không có</th>
                    </tr>
                    <tr>
                        <th>Tình trạng rút tiền</th>
                        <th>Không có</th>
                    </tr>
                    <tr>
                        <th>Nguyên nhân</th>
                        <th>Không có</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
