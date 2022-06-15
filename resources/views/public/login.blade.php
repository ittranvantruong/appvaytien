<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="{{ asset('public/lib/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('public/lib/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('public/lib/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<main>
    <section class="container banner pt-2 pb-4">
        <div class="row">
            <div class="col-8">
                <h3><strong>Hạn mức tối đa 1 khoản vay là 1 tỉ</strong></h3>
                <p class="m-0">Chỉ 10' có tiền. Lãi suất thấp chỉ từ 0.5%/ tháng. Vay không cần thế chấp chỉ cần chứng minh thư.</p>
            </div>
            <div class="col-4">
                <img class="pt-2 icon" src="{{ asset('public/images/dore.png') }}">
            </div>
        </div>
    </section>
    <section class="position-relative content-main">
        <div class="container">
            <nav class="pb-3">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="width: 50%;">
                        Đăng nhập
                    </button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="width: 50%;">
                        Đăng ký
                    </button> 
                </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                <!-- Tab đăng nhập ở đây -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <form method="POST" action="{{ route('post.login') }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="phone" class="form-control" required
                                placeholder="Vui lòng nhập số điện thoại của bạn">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                            <input type="password" name="password" class="form-control" required
                                placeholder="Vui lòng nhập mật khẩu của bạn">
                        </div>

                        <button class="btn btn-full-tim" type="submit" >Đăng nhập ngay</button>
                    @csrf
                    </form>
                </div>

                <!-- Tab đăng ký ở đây -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <form method="POST" action="{{ route('post.register') }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" name="phone" required placeholder="Vui lòng nhập số điện thoại của bạn">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                            <input type="password" class="form-control" name="password" required placeholder="Vui lòng nhập mật khẩu của bạn">
                        </div>
                        <p></p>

                        <!-- <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Vui lòng nhập mã mời">
                        </div> -->

                        <button class="btn btn-full-tim" type="submit" >Đăng ký ngay</button>
                    @csrf
                    </form>
                </div>

                <!-- Modal Success Đăng ky-->
                {{-- <div class="modal fade" id="success">
                    <div class="modal-dialog">
                        <div class="modal-content" style="margin-top: 350px">
                            <div class="modal-body text-center">
                                <img src="{{ asset('public/images/user.png') }}" style="position: absolute; top: -55%; left: 36.5%;" width="100px">
                                <p class="p-1"></p>
                                <h4 class="text-danger">Đăng ký thành công!</h4>
                                <p id="mess_here">Chúc mừng bạn đã đăng ký 
                                    tài khoản thành công. Đăng nhập ngay để sử dụng các chức năng của chúng tôi!</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</main>
</body>
@include('admin.layouts.alert')

</html>