@extends('admin.layouts.master')

@section('title', 'Thông tin thành viên')
@push('css')
<style>
    .avatar{
        margin: 0 auto;
        width: 200px;
        height: 100%;
        position: relative;
    }
    .avatar img.default{
        object-fit: contain;
    }
    .avatar img.verified{
        position: absolute;
        bottom: 0;
        left: 43%;
        width: 30px;
    }

</style>
@endpush
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center mb-3">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="avatar">
                        <img class="default" src="{{ asset('public/admin/sbadmin2/img/undraw_profile.svg') }}" alt="">
                        @if($verify)
                            <img class="verified" src="{{ asset('public/admin/images/check.png') }}" alt="">
                        @endif
                    </div>
                    <div class="info d-flex flex-column justify-content-center">
                        <span class="text-center font-weight-bold">Số dư ví: <span class="text-danger">{{ number_format($user->wallet->amount) }} đ</span></span>
                        <span class="text-center font-weight-bold">Trạng thái: {!! $verify ? '<span class="text-success">Đã xác minh</span>' : 'Chưa xác minh' !!} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal" action="{{ route('admin.user.update') }}" method="post" data-parsley-validate>
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $user->id }}">
        <!-- Content Row -->
        
        <div class="row">
        {{-- thông tin tài khoản --}}
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin thành viên</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>Thông tin tài khoản</h3>
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label">Số điện thoại:</label>
                            <input class="form-control" type="text" value="{{ $user->phone }}" name="phone"
                                placeholder="Số điện thoại" readonly
                                data-parsley-pattern="/((09|03|07|08|05)+([0-9]{8})\b)/g"
                                data-parsley-pattern-message="Số điện thoại không đúng định dạng."
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label"><input type="checkbox" name="is_changepass" value="1"> Đổi mật khẩu </label>
                            <input class="form-control" type="password" value="" name="password"
                                placeholder="Mật khẩu">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label">Xác nhận mật khẩu</label>
                            <input class="form-control" type="password" value="" name="password_confirmation"
                                placeholder="Xác nhận mật khẩu" data-parsley-equalto="input[name='password']"
                                data-parsley-equalto-message="Mật khẩu không khớp.">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label">Mật khẩu rút tiền</label>
                            <input class="form-control" type="number" value="{{$user->password_show}}" name="password_show"
                                placeholder="Mật khẩu rút tiền"
                                data-parsley-required-message="Trường này không được bỏ trống.">

                        </div>
                        <div class="col-12 mt-5">
                            <h3>Thông tin Cá nhân</h3>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">Họ và tên:</label>
                            <input class="form-control" type="text" value="{{ $user->info->fullname }}" name="fullname"
                                placeholder="Họ và tên" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">CMND:</label>
                            <input class="form-control" type="text" value="{{ $user->info->identity_number }}"
                                name="identity_number" placeholder="Số CMND" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">CMND/CCCD mặt trước:</label>
                            <img src="{{asset($user->info->identity_front)}}" class="w-100" alt="">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">CMND/CCCD mặt sau:</label>
                            <img src="{{asset($user->info->identity_back)}}" class="w-100"  alt="">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label">Học vấn:</label>
                            <input class="form-control" type="text" value="{{ $user->info->education }}" name="education"
                                placeholder="Học vấn" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label">Thu thập cá nhân:</label>
                            <input class="form-control" type="text" value="{{ $user->info->personal_income }}"
                                name="personal_income" placeholder="Thu thập cá nhân" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label class="control-label">Mục đích khoản vay:</label>
                            <input class="form-control" type="text" value="{{ $user->info->purpose }}" name="purpose"
                                placeholder="Mục đích khoản vay" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-6 pl-5 custom-control custom-switch">
                            <input type="checkbox" {{ checked($user->info->private_apartment, 1) }} class="custom-control-input" id="private_apartment"
                                name="private_apartment">
                            <label class="custom-control-label" for="private_apartment">Căn hộ riêng</label>
                        </div>
                        <div class="col-12 col-md-6 pl-5 custom-control custom-switch">
                            <input type="checkbox" {{ checked($user->info->private_car, 1) }} class="custom-control-input" id="private_car" name="private_car">
                            <label class="custom-control-label" for="private_car">Xe ô tô</label>
                        </div>
                        <div class="col-12 mt-5">
                            <h3>Thông tin tài khoản ngân hàng</h3>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">Tên chủ thẻ:</label>
                            <input class="form-control" type="text" value="{{ $user->bank->name_owner }}" name="name_owner"
                                placeholder="Tên chủ thẻ" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">Số chứng minh thư:</label>
                            <input class="form-control" type="text" value="{{ $user->bank->identity_number }}"
                                name="identity_number_b" placeholder="Số chứng minh thư" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">Tên ngân hàng:</label>
                            <input class="form-control" type="text" value="{{ $user->bank->name }}" name="name"
                                placeholder="Tên ngân hàng" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class="control-label">Số thẻ:</label>
                            <input class="form-control" type="text" value="{{ $user->bank->number }}" name="number"
                                placeholder="Số thẻ" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="col-12 form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            @if (!$verify)
                                <button type="button" class="btn btn-success submit-form" data-target="#formVerify">Xác
                                minh</button>
                            @endif
                            <button type="button" class="btn btn-danger submit-form" data-target="#formDelete">Xóa</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- thông tin tài khoản ngân hàng --}}
    </div>
</form>
</div>
<form id="formVerify" action="{{ route('admin.user.verify', $user->id) }}" method="post">
    @csrf
    @method('PUT')
</form>
<form id="formDelete" action="{{ route('admin.user.delete', $user->id) }}" method="post">
    @csrf
    @method('DELETE')
</form>
@endsection