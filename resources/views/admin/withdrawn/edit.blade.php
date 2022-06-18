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
                        <h3>Chi tiết Lệnh rút</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Thông tin chung</h3>
                                    </div>
                                    <div class="card-body card-height-static">
                                        <p>Số điện thoại: {{ $withdrawn->user->phone }}</p>
                                        <p>Họ và tên: {{ optional($withdrawn->user)->info->fullname }}</p>
                                        <p>CMND: {{ optional($withdrawn->user)->info->identity_number }}</p>
                                        <p>Học vấn: {{ optional(optional($withdrawn->user)->info)->education }}</p>
                                        <p>Thu thập cá nhân:
                                            {{ optional(optional($withdrawn->user)->info)->personal_income }}</p>
                                        <p>Mục đích vay: {{ optional(optional($withdrawn->user)->info)->purpose }}</p>
                                        <p>Căn hộ riêng:
                                            {{ optional(optional($withdrawn->user)->info)->private_apartment ? 'Có' : 'Không' }}
                                        </p>
                                        <p>Xe ô tô:
                                            {{ optional(optional($withdrawn->user)->info)->private_car ? 'Có' : 'Không' }}
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
                                        <p>Tên chủ thẻ: {{ optional(optional($withdrawn->user)->bank)->name_owner }}</p>
                                        <p>Chứng minh thư:
                                            {{ optional(optional($withdrawn->user)->bank)->identity_number }}</p>
                                        <p>Tên ngân hàng: {{ optional(optional($withdrawn->user)->bank)->name }}</p>
                                        <p>Số thẻ: {{ optional(optional($withdrawn->user)->bank)->number }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Thông tin lệnh rút</h3>
                                    </div>
                                    <div class="card-body card-height-static">
                                        <p>Số dư hiện tại:
                                            {{ number_format(optional(optional($withdrawn->user)->wallet)->amount) }}</p>
                                        <p>Khoản rút: {{ number_format($withdrawn->amount) }}</p>
                                        <p>Trạng thái: {!! formatStatusWithdrawn($withdrawn->status) !!}</p>
                                        <p>Thời gian rút: {{ date('d/m/Y', strtotime($withdrawn->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @if (!$withdrawn->status)
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Duyệt lệnh rút</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 text-center">
                                                    <form action="{{ route('admin.withdrawn.process') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $withdrawn->id }}">
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-success">Xác
                                                            nhận</button>
                                                    </form>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#cancelWithdrawn">
                                                        Hủy lệnh rút
                                                    </button>
                                                    <div class="modal fade" id="cancelWithdrawn" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hủy lệnh
                                                                        rút</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('admin.withdrawn.process') }}"
                                                                    method="post">
                                                                    <div class="modal-body">
                                                                        @csrf <div class="modal-body">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $withdrawn->id }}">

                                                                            <input type="hidden" name="status"
                                                                                value="2">
                                                                            <div class="form-group">
                                                                                <label for="">Lý do hủy</label>
                                                                                <textarea name="note" id="" cols="30" rows="10" style="width:100%"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Hủy</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Xác
                                                                                nhận</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($withdrawn->status ==2)
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Lý do hủy</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                {{$withdrawn->note}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            {{-- thông tin tài khoản ngân hàng --}}
        </div>
    </div>

@endsection
