<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="{{ asset('public/lib/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ asset('public/lib/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('public/lib/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js') }}">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('public/css/home.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<main>
    <p class="p-2"></p>
    <section class="container" id="content_phu">
        <div class="row">
            <div class="col-8">
                <h3><strong>Hạn mức tối đa 1 khoản vay là 1 tỉ</strong></h3>
                <p class="m-0">Chỉ 10' có tiền. Lãi suất thấp chỉ từ 0.5%/ tháng. Vay không cần thế chấp chỉ cần chứng minh thư.</p>
            </div>
            <div class="col-4">
                <img class="pt-2" src="{{ asset('public/images/dore.png') }}" style="position: absolute; z-index: 1; width: 30%;top: 8%;">
            </div>
        </div>
    </section>
    <p class="p-1"></p>

    <section class="position-relative" id="login_form">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="width: 50%;">
                        Đăng nhập
                    </button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="width: 50%;">
                        Đăng ký
                    </button> 
                </div>
            </nav>
            <p></p>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Vui lòng nhập số điện thoại của bạn">
                    </div>
                    <p></p>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Vui lòng nhập mật khẩu của bạn">
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Vui lòng nhập số điện thoại của bạn">
                    </div>
                    <p></p>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Vui lòng nhập mật khẩu của bạn">
                    </div>
                    <p></p>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Vui lòng nhập mã mời">
                    </div>
                </div>


                <a class="btn btn-full-tim">Xác nhận thông tin</a>
            </div>
        </div>
    </section>
</main>
</body>

<script src="{{ asset('public/js/home.js') }}"></script>

</html>