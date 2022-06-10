<div class="card mb-3" style="width: 100%">
    <div class="card-body" style="padding-bottom: 0px; padding-left: 11px; padding-right: 11px;">
        <div class="row" id="title_khoanvay">
            <p class="text-muted m-0">
                <i class="fa fa-flag-o fs-20"></i> mã số khoản vay
                <span class="float-end"><i class="fa fa-grav fs-20"></i></span>
            </p>
            <p class="text-muted m-0">
                {{ $item->code }}
                <span class="float-end text-purple">{{ statusUserLoanAmount($item->stauts) }}</span>
            </p>
        </div>
        <hr>
        <div class="row">
            <p class="text-muted">
                Hạn mức khoản vay
                <span class="float-end">{{ number_format($item->loan_limit) }}</span>
            </p>
            <p class="text-muted">
                Khoản vay
                <span class="float-end">{{ $item->loan_amount }}</span>
            </p>
            <p class="text-muted">
                Thời hạn khoản vay
                <span class="float-end">{{ $item->loan_period }}</span>
            </p>
            <p class="text-muted">
                Lãi suất tháng
                <span class="float-end">{{ $item->interest_rate }}%</span>
            </p>
            <p class="text-muted">
                Thời gian đăng ký
                <span class="float-end">{{ date('d-m-Y', strtotime($item->created_at)) }}</span>
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