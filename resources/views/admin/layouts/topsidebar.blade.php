<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            {{ optional(auth()->guard('admin')->user())->name }}
                        </span>
                        <img class="img-profile rounded-circle"
                            src="{{ asset(config('custom.images.avatar-user')) }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Thông tin cá nhân
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePassAdmin">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đổi mật khẩu
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Đăng xuất
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <div class="modal fade" id="changePassAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.auth.changePassword') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label class="control-label">Mật khẩu cũ:</label>
                                    <input class="form-control" type="password" value="" name="old_password"
                                        required placeholder="Mật khẩu cũ"
                                        data-parsley-required-message="Trường này không được bỏ trống.">
                                </div>
                                <div class="col-12 form-group">
                                    <label class="control-label">Mật khẩu:</label>
                                    <input class="form-control" type="password" value="" name="password" required
                                        placeholder="Mật khẩu"
                                        data-parsley-required-message="Trường này không được bỏ trống.">
                                </div>
                                <div class="col-12 form-group">
                                    <label class="control-label">Xác nhận mật khẩu</label>
                                    <input class="form-control" type="password" value=""
                                        name="password_confirmation" placeholder="Xác nhận mật khẩu" required
                                        data-parsley-equalto="input[name='password']"
                                        data-parsley-equalto-message="Mật khẩu không khớp."
                                        data-parsley-required-message="Trường này không được bỏ trống.">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
