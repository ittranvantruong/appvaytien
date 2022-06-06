@extends('public.layouts.master')
@section('content')
<main>
    <p class="p-2"></p>
    <section class="container" id="content_phu">
        <div class="row">
            <div class="col-8">
                <h6><strong>Cho vay dễ dàng vay nhanh</strong></h6>
                <p class="m-0">Khoản vay tối đa 1 tỷ đồng</p>
                <p class="m-0">phê duyệt trong 10 phút</p>
            </div>
            <div class="col-4">
                <img class="pt-2" src="{{ asset('public/images/dore.png') }}" style="position: absolute; z-index: 1; width: 30%;">
            </div>
        </div>
    </section>
    <p class="p-4"></p>

    <section class="position-relative" id="content_chinh">
        <div class="row m-3" id="mid_content">
            <div class="col-12">
                <h6 class="m-0"><strong>Khoản vay ước tính (Đồng)</strong></h6>
                <h3 class="m-0" id="gia_tien">
                    10 triệu đến 50 triệu
                </h3>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-home" style="font-size: 40px;"></i>
                    </div>
                    <div class="col-9">
                        <p class="m-0 pt-1">0.5%</p>
                        <p class="m-0 fs-10">lãi suất tháng</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fa fa-home" style="font-size: 40px;"></i>
                    </div>
                    <div class="col-9 pt-1">
                        <p class="m-0" id="thoi-gian-vay">12 tháng</p>
                        <p class="m-0 fs-10">thời hạn khoản vay</p>
                    </div>
                </div>
            </div>
        </div>

        <!--------------- FINAL CONTENT ------------------->

        <div class="container" id="final_content">
        <!-- Content khoan vay uoc tinh -->
            <div class="row pb-2">
                <div class="col-12 text-center">
                    <h6><strong>Khoản vay ước tính (Đồng)</strong></h6>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 42.5%; background-color:#e9ecef"></div>
                        <div class="progress-bar" role="progressbar" style="width: 15%; background-color:#28113d"></div>
                    </div>
                </div>
            </div>

            <div id="group_khoanvay">
                <div class="row pb-2">
                    <div class="col-4">
                        <input class="btn btn-tim khoanvay" type="button" id="10-50tr"
                            value="10 đến 50 triệu" onclick="changeText(this.value);"/>
                    </div>

                    <div class="col-4">
                        <input class="btn btn-tim khoanvay" type="button" id="50-100tr"
                            value="50 đến 100 triệu" onclick="changeText(this.value);"/>
                    </div>

                    <div class="col-4">
                        <input class="btn btn-tim khoanvay" type="button" 
                            value="100 đến 300 triệu" onclick="changeText(this.value);"/>
                    </div>
                </div>

                <div class="row pb-2">
                    <div class="col-4">
                        <input class="btn btn-tim khoanvay" type="button" 
                            value="300 đến 500 triệu" onclick="changeText(this.value);"/>
                    </div>

                    <div class="col-4">
                        <input class="btn btn-tim khoanvay" type="button" 
                            value="500 đến 1 tỷ" onclick="changeText(this.value);"/>
                    </div>

                    <div class="col-4">
                        <input class="btn btn-tim khoanvay" type="button" 
                            value="1 tỷ trở lên" onclick="changeText(this.value);"/>
                    </div>
                </div>
            </div>

            <div class="row pb-2">
                <div class="col-12 text-center">
                    <h6><strong>Thời gian cho vay</strong></h6>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar" role="progressbar" style="width: 42.5%; background-color:#e9ecef"></div>
                        <div class="progress-bar" role="progressbar" style="width: 15%; background-color:#28113d"></div>
                    </div>
                </div>
            </div>

            <div id="group_thoigian">
                <div class="row pb-2">
                    <div class="col-6">
                        <input class="btn btn-tim thoigianvay" type="button" 
                            value="12 tháng" onclick="thoiGianVay(this.value);"/>
                    </div>
                    <div class="col-6">
                        <input class="btn btn-tim thoigianvay" type="button" 
                            value="18 tháng" onclick="thoiGianVay(this.value);"/>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-6">
                        <input class="btn btn-tim thoigianvay" type="button" 
                            value="24 tháng" onclick="thoiGianVay(this.value);"/>
                    </div>
                    <div class="col-6">
                        <input class="btn btn-tim thoigianvay" type="button" 
                            value="36 tháng" onclick="thoiGianVay(this.value);"/>
                    </div>
                </div>
            </div>

            <a class="btn btn-full-tim" data-bs-toggle="modal" data-bs-target="#dangkykhoanvay">
                Đăng ký khoản vay
            </a>
              
            <!-- Modal Xac Nhan khoan Vay -->
            <div class="modal fade" id="dangkykhoanvay" style="margin-top: 125px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="text-align: center; width: 100%;">
                                Đăng ký khoản vay</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <p>Tên người vay <span class="float-end">Trần Kim Anh Tuấn</span></p>
                                    <p>Số CMND <span class="float-end">2123456789</span></p>
                                    <p>Số điện thoại <span class="float-end">0123456789</span></p>
                                    <p>Hạn mức khoản vay <span class="float-end" id="text_modal_khoangvay">10 đến 50 triệu</span></p>
                                    <p>Thời hạn khoản vay <span class="float-end" id="text_modal_tgvay">12 tháng</span></p>
                                    <p>Lãi suất hằng tháng <span class="float-end">0.5%</span></p>
                                    <p class="text-danger">Tôi đã đọc hiểu hợp đồng vay và kiểm tra thông tin khoản vay. Sau khi
                                        nhấn nút xác nhận để đăng ký vay, hợp đồng này sẽ có hiệu lực. Nếu vi phạm hợp
                                        đồng vì lý do cá nhân, tôi sẵn sàng chịu mọi trách nhiệm pháp lý.
                                    </p>
                                    <a class="btn btn-tim">Xem hợp đồng vay</a>
                                    <p></p>
                                    <a class="btn btn-full-tim" data-bs-toggle="modal" data-bs-target="#successModal">Xác nhận khoản vay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
            <!-- Modal Success Đăng ky-->
            <div class="modal fade" id="successModal">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 350px">
                        <div class="modal-body text-center">
                            <img src="{{ asset('public/images/user.png') }}" style="position: absolute; top: -55%; left: 36.5%;" width="100px">
                            <p class="p-1"></p>
                            <h4>Chúc mừng!</h4>
                            <p>Bạn đã đăng ký vay tiền thành công !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
