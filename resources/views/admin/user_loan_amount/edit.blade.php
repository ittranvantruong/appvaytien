@extends('admin.layouts.master')

@section('title', 'Chi tiết khoản vay')
@push('css')
    <style>
        .card-height-static {
            min-height: 360px;
        }
    </style>
@endpush
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">
            {{-- thông tin tài khoản --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Chi tiết khoản vay</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Thông tin chung</h3>
                                    </div>
                                    <div class="card-body card-height-static">
                                        <p>Số điện thoại: {{ $user_loan_amount->phone }}</p>
                                        <p>Họ và tên: {{ $user_loan_amount->fullname }}</p>
                                        <p>CMND: {{ $user_loan_amount->identity_number }}</p>
                                        <p>Học vấn: {{ optional(optional($user_loan_amount->user)->info)->education }}</p>
                                        <p>Thu thập cá nhân:
                                            {{ optional(optional($user_loan_amount->user)->info)->personal_income }}</p>
                                        <p>Mục đích khoản vay:
                                            {{ optional(optional($user_loan_amount->user)->info)->purpose }}</p>
                                        <p>Căn hộ riêng:
                                            {{ optional(optional($user_loan_amount->user)->info)->private_apartment ? 'Có' : 'Không' }}
                                        </p>
                                        <p>Xe ô tô:
                                            {{ optional(optional($user_loan_amount->user)->info)->private_car ? 'Có' : 'Không' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Tài khoản ngân hàng</h3>
                                    </div>
                                    <div class="card-body card-height-static">
                                        <p>Tên chủ thẻ:
                                            {{ optional(optional($user_loan_amount->user)->bank)->name_owner }}</p>
                                        <p>Chứng minh thư:
                                            {{ optional(optional($user_loan_amount->user)->bank)->identity_number }}</p>
                                        <p>Tên ngân hàng: {{ optional(optional($user_loan_amount->user)->bank)->name }}
                                        </p>
                                        <p>Số thẻ: {{ optional(optional($user_loan_amount->user)->bank)->number }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Thông tin khoản vay</h3>
                                    </div>
                                    <div class="card-body card-height-static">
                                        <p>Mã khoản vay: {{ $user_loan_amount->code }}</p>
                                        <p>Khoản vay: {{ $user_loan_amount->loan_amount }}</p>
                                        <p>Thơi gian: {{ $user_loan_amount->loan_period }}</p>
                                        @if ($user_loan_amount->loan_limit && $user_loan_amount->status)
                                            <p>Hạn mức: {{ number_format($user_loan_amount->loan_limit) }} đ</p>
                                        @endif
                                        <p>Lãi suất: {{ $user_loan_amount->interest_rate }} %</p>
                                        <p>Trạng thái: {!! $user_loan_amount->status ? '<span class="text-success">Đã xét duyệt</span>' : 'Chưa xét duyệt' !!}</p>
                                        <p>Ngày đăng ký: {{ date('d/m/Y', strtotime($user_loan_amount->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @if (!$user_loan_amount->loan_limit && !$user_loan_amount->status)
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Duyệt khoản vay</h3>
                                        </div>
                                        <div class="card-body">
                                            <form id="formUpdate"
                                                action="{{ route('admin.user.loan.amount.update', $user_loan_amount->id) }}"
                                                method="post" data-parsley-validate>
                                                @csrf
                                                @method('PUT')
                                                {{-- <input type="hidden" name="id" value="{{ $user_loan_amount->id }}"> --}}
                                                <div class="input-group mb-3">
                                                    <input type="text" name="loan_limit" class="form-control"
                                                        placeholder="Nhập hạn mức" min="0" required
                                                        data-parsley-type="number"
                                                        data-parsley-required-message="Trường này không được bỏ trống."
                                                        data-parsley-type-message="Trường này phải là số."
                                                        data-parsley-errors-container="#erroLoanLimit"
                                                        aria-label="Nhập hạn mức" aria-describedby="button-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success submit-form" type="button"
                                                            id="button-addon2" data-target="#formUpdate">Duyệt</button>
                                                    </div>
                                                </div>
                                                <div id="erroLoanLimit"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h3>Sửa khoản vay</h3> 
                                            <a target="_blank" class="btn btn-primary" href="{{route('admin.user.loan.amount.exportPdf', $user_loan_amount->id)}}">Xem hợp đồng</a>

                                        </div>
                                        <div class="card-body">
                                            <form id="formUpdate"
                                                action="{{ route('admin.user.loan.amount.updateLoanLimit', $user_loan_amount->id) }}"
                                                method="post" data-parsley-validate>
                                                @csrf
                                                @method('PUT')
                                                {{-- <input type="hidden" name="id" value="{{ $user_loan_amount->id }}"> --}}
                                                <div class="input-group mb-3">
                                                    <input type="text" name="loan_limit" class="form-control"
                                                        placeholder="Nhập hạn mức" min="0" required
                                                        data-parsley-type="number"
                                                        data-parsley-required-message="Trường này không được bỏ trống."
                                                        data-parsley-type-message="Trường này phải là số."
                                                        data-parsley-errors-container="#erroLoanLimit"
                                                        aria-label="Nhập hạn mức" aria-describedby="button-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success submit-form" type="button"
                                                            id="button-addon2" data-target="#formUpdate">Sửa</button>
                                                    </div>
                                                </div>
                                                <div id="erroLoanLimit"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                           
                            <div class="col-12 text-center mt-3">
                                <button type="button" class="btn btn-danger submit-form"
                                    data-target="#formDelete">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- thông tin tài khoản ngân hàng --}}
        </div>
    </div>
    <form id="formDelete" action="{{ route('admin.user.loan.amount.delete', $user_loan_amount->id) }}" method="post">
        @csrf
        @method('DELETE')
    </form>
@endsection
