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
                        <p>Tên người vay <span class="float-end">{{ optional($user->info)->fullname }}</span></p>
                        <p>Số CMND <span class="float-end">{{ optional($user->info)->identity_number }}</span></p>
                        <p>Số điện thoại <span class="float-end">{{ $user->phone }}</span></p>
                        <p>Khoản vay 
                            <span class="float-end" id="text_modal_khoangvay">{{$loan_amount_first->name ?? ''}}</span>
                        </p>
                        <p>Thời hạn khoản vay 
                            <span class="float-end" id="text_modal_tgvay">{{$loan_period_first->name ?? ''}}</span>
                        </p>
                        <p>Lãi suất hằng tháng 
                            <span class="float-end">
                                <span id="text_lai_suat_vay">{{$loan_period_first->interest_rate ?? ''}}</span>
                            %</span>
                        </p>
                        <p class="text-danger">Tôi đã đọc hiểu hợp đồng vay và kiểm tra thông tin khoản vay. Sau khi
                            nhấn nút xác nhận để đăng ký vay, hợp đồng này sẽ có hiệu lực. Nếu vi phạm hợp
                            đồng vì lý do cá nhân, tôi sẵn sàng chịu mọi trách nhiệm pháp lý.
                        </p>
                        <a class="btn btn-tim">Xem hợp đồng vay</a>
                        <p></p>
                        <button type="submit" class="btn btn-full-tim">Xác nhận khoản vay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>