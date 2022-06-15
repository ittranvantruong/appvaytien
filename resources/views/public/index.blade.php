@extends('public.layouts.master')
@section('title', 'Trang chủ')
@push('css')
<link href="{{ asset('public/css/home.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<main>
    <section class="container banner pt-4 pb-5 mt-3 mb-2">
        <div class="row">
            <div class="col-8">
                <h6><strong>Cho vay dễ dàng vay nhanh</strong></h6>
                <p class="m-0">Khoản vay tối đa 1 tỷ đồng</p>
                <p class="m-0">phê duyệt trong 10 phút</p>
            </div>
            <div class="col-4">
                <img class="pt-2" src="{{ asset('public/images/dore.png') }}" style="position: absolute; z-index: 1; width: 29%;">
            </div>
        </div>
    </section>

    <section class="position-relative content-main">
    <form action="{{ route('user.loan.amount.store') }}" method="POST">
        @csrf
        <div class="row m-3" id="mid_content">
            <div class="col-12">
                <h6 class="m-0"><strong>Khoản vay ước tính (Đồng)</strong></h6>
                <h3 class="m-0" id="gia_tien">
                    {{ optional($loan_amount->first())->name ?? '' }}
                </h3>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-home" style="font-size: 40px;"></i>
                    </div>
                    <div class="col-9">
                        <p class="m-0 pt-1"><span id="laisuat">
                            {{ optional($loan_period->first())->interest_rate ?? '' }}</span>%</p>
                        <p class="m-0 fs-10">lãi suất tháng</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-home" style="font-size: 40px;"></i>
                    </div>
                    <div class="col-9 pt-1">
                        <p class="m-0" id="thoi-gian-vay">{{ optional($loan_period->first())->name ?? '' }}</p>
                        <p class="m-0 fs-10">thời hạn khoản vay</p>
                    </div>
                </div>
            </div>
        </div>

        <!--------------- FINAL CONTENT ------------------->

        <div class="container" id="final_content">
        <!-- Content khoan vay uoc tinh -->
            <div class="row pb-2">
                <div class="col-12 text-center">
                    <h6><strong>Khoản vay ước tính (Đồng)</strong></h6>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 42.5%; background-color:#e9ecef"></div>
                        <div class="progress-bar" role="progressbar" style="width: 15%; background-color:#28113d"></div>
                    </div>
                </div>
            </div>

            <div id="group_khoanvay">
                <div class="row pb-2">
                    @foreach($loan_amount as $value)
                    <div class="col-6 pb-2">
                        <input class="btn btn-tim khoanvay" type="button"
                            value="{{$value->name}}" onclick="changeText(this.value);"/>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="row pb-2">
                <div class="col-12 text-center">
                    <h6><strong>Thời gian cho vay</strong></h6>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 42.5%; background-color:#e9ecef"></div>
                        <div class="progress-bar" role="progressbar" style="width: 15%; background-color:#28113d"></div>
                    </div>
                </div>
            </div>

            <div id="group_thoigian">
                <div class="row pb-2">
                    @foreach ($loan_period as $value)
                    <div class="col-6 pb-2">
                        <input class="btn btn-tim thoigianvay" type="button" 
                            value="{{$value->name}}" onclick="thoiGianVay(this.value, {{$value->interest_rate}});"/>
                    </div>
                    @endforeach
                </div>
            </div>

            @if ($user->verified == 1)
            <a class="btn btn-full-tim" data-bs-toggle="modal" data-bs-target="#dangkykhoanvay">
                Đăng ký khoản vay
            </a>
            @else
            <a class="btn btn-tim" style="font-size: 16px">
                Hồ sơ của bạn chưa hoàn thành!
            </a>
            @endif
            <!-- Modal Xac Nhan khoan Vay -->
            @include('public.modal.index', [
                'user' => $user, 
                'loan_amount_first' => optional($loan_amount->first()), 
                'loan_period_first' => optional($loan_period->first())
                ])
            <!-- Modal Success Đăng ky-->
            <div class="modal fade" id="successModal">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 350px">
                        <div class="modal-body text-center">
                            <img src="{{ asset('public/images/user.png') }}" style="position: absolute; top: -55%; left: 36.5%;" width="100px">
                            <p class="p-1"></p>
                            <h4>Chúc mừng!</h4>
                            <p>Bạn đã đăng ký vay tiền thành công!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Error Đăng ky-->
            <div class="modal fade" id="errorModal">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 350px">
                        <div class="modal-body text-center">
                            <img src="{{ asset('public/images/user.png') }}" style="position: absolute; top: -55%; left: 36.5%;" width="100px">
                            <p class="p-1"></p>
                            <h4 class="text-danger">Đăng ký vay không thành công!</h4>
                            <p>Bạn chưa chọn đầy đủ yêu cầu vay!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
    
</main>

@if (session('successModal'))
<script type="text/javascript">
    window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#successModal").modal('show');
    }
</script>
@endif

@if (session('errorModal'))
<script type="text/javascript">
    window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#errorModal").modal('show');
    }
</script>
@endif
@endsection
@push('js')
<script src="{{ asset('public/js/home.js') }}"></script>
@endpush

