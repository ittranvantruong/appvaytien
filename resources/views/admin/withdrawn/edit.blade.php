@extends('admin.layouts.master')

@section('title', 'Chi tiết khoản vay')
@push('css')
    <style>
        .card-height-static{
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
                                    <p>CMND: {{ optional($withdrawn->user)->info->identity_number}}</p>
                                    <p>Học vấn: {{ optional(optional($withdrawn->user)->info)->education }}</p>
                                    <p>Thu thập cá nhân: {{ optional(optional($withdrawn->user)->info)->personal_income }}</p>
                                    <p>Mục đích vay: {{ optional(optional($withdrawn->user)->info)->purpose }}</p>
                                    <p>Căn hộ riêng: {{ optional(optional($withdrawn->user)->info)->private_apartment ? 'Có' : 'Không' }}</p>
                                    <p>Xe ô tô: {{ optional(optional($withdrawn->user)->info)->private_car ? 'Có' : 'Không' }}</p>
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
                                    <p>Chứng minh thư: {{ optional(optional($withdrawn->user)->bank)->identity_number }}</p>
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
                                    <p>Số dư hiện tại: {{number_format(optional(optional($withdrawn->user)->wallet)->amount)}}</p>
                                    <p>Khoản rút: {{ number_format($withdrawn->amount) }}</p>
                                    <p>Trạng thái: {!! formatStatusWithdrawn($withdrawn->status) !!}</p>
                                    <p>Thời gian rút: {{date('d/m/Y', strtotime($withdrawn->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        @if(!$withdrawn->status)
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Duyệt lệnh rút</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <a class="btn btn-success" href="{{route('admin.withdrawn.process', ['withdrawn'=>$withdrawn,'status'=>1])}}">Chấp nhận cho rút</a>
                                        </div>
                                        <div class="col-6 text-center">
                                            <a class="btn btn-danger" href="{{route('admin.withdrawn.process', ['withdrawn'=>$withdrawn,'status'=>2])}}">Hủy lệnh rút</a>

                                        </div>
                                    </div>
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