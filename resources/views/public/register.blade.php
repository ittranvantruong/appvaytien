<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
                    <p class="m-0">Chỉ 10' có tiền. Lãi suất thấp chỉ từ 0.5%/ tháng. </p>
                </div>
                <div class="col-4">
                    <img class="pt-2 icon" src="{{ asset('public/images/dore.png') }}">
                </div>
            </div>
        </section>
        <section class="position-relative content-main">
            <div class="container">
                <div class="py-2 text-center">
                    <a class="text-danger" target="_blank" href="https://zalo.me/{{$setting_zalo}}">Liên hệ lấy mã giới thiệu</a>
                </div>
                <nav class="pb-3">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class=" btn btn-secondary" href="{{route('login')}}" style="width: 50%;">
                            Đăng nhập
                        </a>
                        <button class="nav-link active" style="width: 50%;">
                            Đăng ký
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                        aria-labelledby="nav-profile-tab" tabindex="0">
                        <form method="POST" action="{{ route('post.register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fa fa-certificate" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control" name="code" required
                                    placeholder="Vui lòng nhập mã giới thiệu">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </span>
                                <input type="number" class="form-control" name="phone" required
                                    placeholder="Vui lòng nhập số điện thoại của bạn">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                                <input type="password" class="form-control" name="password" required
                                    placeholder="Vui lòng nhập mật khẩu của bạn">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                </span>
                                <input type="number" class="form-control" name="identity_number" required
                                    placeholder="Vui lòng nhập số CMNDD/CCCD">
                            </div>
                            <div class="form-group">
                                <label for="">CMND/CCCD mặt trước <sup class="text-danger">*</sup></label>
                                <div class="text-center py-2">
                                    <input accept="image/*" class="d-none" name="identity_front" type='file' id="imgFront" />
                                    <label for="imgFront">
                                        <img  id="idFront" src="{{ asset('public/images/id_back.png') }}"
                                        class="w-75" alt="Mặt trước giấy tờ"/>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">CMND/CCCD mặt sau <sup class="text-danger">*</sup></label>
                                <div class="text-center py-2">
                                    <input accept="image/*" class="d-none" name="identity_back" type='file' id="imgBack" />
                                    <label for="imgBack">
                                        <img  id="idBack" src="{{ asset('public/images/id_front.png') }}"
                                        class="w-75" alt="Mặt sau giấy tờ"/>
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-full-tim" type="submit">Đăng ký ngay</button>
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>
</body>
<script>
    imgFront.onchange = evt => {
        const [file] = imgFront.files
        if (file) {
            idFront.src = URL.createObjectURL(file)
        }
    }
    imgBack.onchange = evt => {
        const [file] = imgBack.files
        if (file) {
            idBack.src = URL.createObjectURL(file)
        }
    }
</script>
@include('admin.layouts.alert')

</html>
