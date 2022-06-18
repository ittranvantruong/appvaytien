@extends('public.layouts.master')
@section('title', 'Ví của tôi')
@section('content')
<main>
    <p class="p-2"></p>
    <section class="container banner">
        <div class="row" id="bkimg_money">
            <div class="col-4">
                <img class="pt-2" src="{{ asset('public/images/dore.png') }}" width="100%">
            </div>
            <div class="col-8 text-center">
                <h6><strong>Số dư tài khoản (đồng)</strong></h6>
                <h5 class="m-0"><i class="fa fa-money" aria-hidden="true"></i> 
                    {{number_format($user->wallet->amount)}} VNĐ</h5>
                <p></p>
                <a class="btn btn-tim text-dark" href="{{route('withdrawn.index')}}" style="width:50%">Rút tiền ngay</a>
            </div>
        </div>
    </section>
    <p class="p-1"></p>

    <section class="position-relative content-main">
        <div class="container">
            <h5 class="text-center">Thẻ ngân hàng của tôi</h5>
            <img src="{{ asset('public/images/visa.png') }}" width="100%" height="150px">
            <p class="text-center text-purple"><i class="fa fa-shield" aria-hidden="true"></i>
                Sự an toàn của quỹ tài khoản được ngân hàng đảm bảo
            </p>
            <h5 class="text-center">Tiến độ rút tiền</h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <th>
                        Số tiền
                    </th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody>
                    @foreach($user->withdrawns()->latest()->get() as $item)
                        <tr>
                            <td>
                                {{number_format($item->amount)}}
                            </td>
                            <th>
                                {{date('H:i:s d/m/Y', strtotime($item->created_at))}}
                            </th>
                            <th>
                                {!!formatStatusWithdrawn($item->status)!!}
                            </th>
                        </tr>
                        @if($item->status == 2)
                        <tr class="bg-dark text-light">
                            <td colspan="3">Lý do: {{$item->note}}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
