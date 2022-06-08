@extends('admin.layouts.master')

@section('title', 'Thêm thành viên')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="form-horizontal" action="{{ route('admin.user.store') }}" method="post" data-parsley-validate>
        @csrf
        <!-- Content Row -->
        <div class="row">

            {{-- thông tin tài khoản --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm thành viên</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h3>Thông tin tài khoản</h3>
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="control-label">Số điện thoại:</label>
                                <input class="form-control" type="text" value="{{ old('phone') }}" name="phone"
                                    placeholder="Số điện thoại" required
                                    data-parsley-pattern="/((09|03|07|08|05)+([0-9]{8})\b)/g"
                                    data-parsley-pattern-message="Số điện thoại không đúng định dạng."
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="control-label">Mật khẩu:</label>
                                <input class="form-control" type="password" value="" name="password" required
                                    placeholder="Mật khẩu"
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="control-label">Xác nhận mật khẩu</label>
                                <input class="form-control" type="password" value="" name="password_confirmation"
                                    placeholder="Xác nhận mật khẩu" required
                                    data-parsley-equalto="input[name='password']"
                                    data-parsley-equalto-message="Mật khẩu không khớp."
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 mt-5">
                                <h3>Thông tin Cá nhân</h3>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label class="control-label">Họ và tên:</label>
                                <input class="form-control" type="text" value="{{ old('fullname') }}" name="fullname"
                                    placeholder="Họ và tên" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label class="control-label">CMND:</label>
                                <input class="form-control" type="text" value="{{ old('identity_number') }}"
                                    name="identity_number" placeholder="Số CMND" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="control-label">Học vấn:</label>
                                <input class="form-control" type="text" value="{{ old('education') }}" name="education"
                                    placeholder="Học vấn" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="control-label">Thu thập cá nhân:</label>
                                <input class="form-control" type="text" value="{{ old('personal_income') }}"
                                    name="personal_income" placeholder="Thu thập cá nhân" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label class="control-label">Mục đích khoản vay:</label>
                                <input class="form-control" type="text" value="{{ old('purpose') }}"
                                    name="purpose" placeholder="Mục đích khoản vay" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 pl-5 custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="private_apartment"
                                    name="private_apartment">
                                <label class="custom-control-label" for="private_apartment">Căn hộ riêng</label>
                            </div>
                            <div class="col-12 col-md-6 pl-5 custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="private_car" name="private_car">
                                <label class="custom-control-label" for="private_car">Xe ô tô</label>
                            </div>
                            <div class="col-12 mt-5">
                                <h3>Thông tin tài khoản ngân hàng</h3>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label class="control-label">Tên chủ thẻ:</label>
                                <input class="form-control" type="text" value="{{ old('name_owner') }}"
                                    name="name_owner" placeholder="Tên chủ thẻ" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label class="control-label">Số chứng minh thư:</label>
                                <input class="form-control" type="text" value="{{ old('identity_number_b') }}"
                                    name="identity_number_b" placeholder="Số chứng minh thư" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label class="control-label">Tên ngân hàng:</label>
                                <input class="form-control" type="text" value="{{ old('name') }}"
                                    name="name" placeholder="Tên ngân hàng" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label class="control-label">Số thẻ:</label>
                                <input class="form-control" type="text" value="{{ old('number') }}"
                                    name="number" placeholder="Số thẻ" required
                                    data-parsley-required-message="Trường này không được bỏ trống.">
                            </div>
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <label class="control-label"></label>
                                    <button type="submit" class="btn btn-primary">Thêm
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- thông tin tài khoản ngân hàng --}}
        </div>
    </form>
</div>

@endsection