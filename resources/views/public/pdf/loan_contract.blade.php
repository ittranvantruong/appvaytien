<!DOCTYPE html>
<html lang="en">

<head>
    <title>HỢP ĐỒNG VAY TIỀN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
    }

    .top-left {
        border: 2px solid #ccc;
        background-color: #fff;
        width: 300px;
        height: auto;
    }

    * {
        font-family: DejaVu Sans !important;
    }

    td,
    .table thead th {
        vertical-align: center;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    table {
        border-collapse: collapse;
    }

    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px;
    }

    .table thead th {
        vertical-align: center;
        border-bottom: 2px solid #dee2e6;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #dee2e6;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th,
    .table-borderless thead th {
        border: 0;
    }
</style>

<body>
    <div>
        <p style="font-size: 28px; text-align: center;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br />ĐỘC LẬP- TỰ DO- HẠNH PHÚC</p>
        <p style="font-size: 36px; text-align: center;margin-top: 50px;"><strong>HỢP ĐỒNG VAY TIỀN</strong></p>

        <p style="font-size: 22px; margin-top: 30px;"><strong>Cơ bản thông tin về khoản vay:</strong></p>
        <p>Bên A (Bên cho vay) CÔNG TY CỔ PHẦN TÀI CHÍNH BẢO LONG</p>
        <p>Bên B ( Bên vay) Ông/ Bà: {{ $data['fullname'] }}</p>
        <p>Số CMND/CCCD: {{ $data['identity_number'] }}</p>
        <p>Ngày kí hợp đồng: {{ now()->format('d-m-Y') }}</p>
        <p>Số tiền vay: {{ number_format($data['loan_amount_limit']) }} vnđ</p>
        <p>Vay trong thời gian: {{ $data['loan_preiod_name'] }}</p>
        <p>Lãi xuất là: {{ $data['interest_rate'] }}%</p>
        <p style="margin-top: 10px;">Hợp đồng nêu rõ bên B đã được đặt thỏa thuận vay khi thương lượng và trên cơ sở tự nguyện và nhất trí. Hai bên cần đọc kĩ tất cả điều khoản trông sự thỏa mãn này, sau khi kí kết vào hợp đồng này coi như các bên đã hiểu đầy đủ và đoòng ý hoàn toàn với tất cả các điều khoản và nội dung này.</p>

        <p style="font-size: 22px; margin-top: 30px;"><strong>PHẦN 1: QUYỀN VÀ NGHĨA VỤ CỦA BÊN A</strong></p>
        <p>TIỀN GỐC ( Chỉ số tiền bên A cho vay): {{ number_format($data['loan_amount_limit']) }} vnđ</p>
        <p>TIỀN LÃI: Chỉ tính toán, thanh toán liên kết dựa trên số tiền gốc, bao gồm cả số tiền thanh toán trong thời gian cho vay thông thường và thời hnj quá hạn</p>
        <p>QUÁ HẠN: Phải thanh toán quá hạn và các khoản chi phí phát sinh khác</p>
        <p>TRẢ NỢ: Bên B hoàn trả gốc và thanh toán tiền lãi hoặc thanh toán duyệt tính dụng vay, tài khoản quản lý.</p>
        <p>_ Lãi xuất cho vay là: {{ $data['interest_rate'] }}</p>
        <p>_ Ngày đăng ký vay là: {{ $data['loan_registration_date'] }}%</p>
        <p>_Phương thức thanh toán: Ngân hàng sẽ tự động trừ vào tài khoản ngân hàng khi đến thời hạn 1 tháng. Khách hàng có thể chủ động thanh toán nợ trước thời hạn theo hướng dẫn của nhân viên.</p>
        <p>+ Cách 1: Thanh toán qua internet banking</p>
        <p>+ Cách 2: Tại các địa điểm ngân hàng giao dịch</p>
        <p>+ Cách 3: Thế giới di động, Viettel pay hoặc tất cả các dịch vụ chuyển tiền</p>
        <p>+ Cách 4: Thanh toán qua ví điẹn tử như MoMo, VN Pay, Zalo Pay</p>

        <p style="font-size: 22px; margin-top: 30px;"><strong>PHẦN 2: QUYỀN VÀ NGHĨA VỤ CỦA BÊN B</strong></p>
        <p>_ Yêu cầu bên A thực hiện đúng các nghĩa vụ đã cam kết</p>
        <p>_ Từ chối các yêu cầu của bên A nếu không đúng với các thỏa thuận trong hợp đồng</p>
        <p>_ Thanh toán đúng hạn toàn bộ nợ ( gốc và lãi) hàng tháng cho bên A</p>
        <p>_ Chịu trách nhiệm trước pháp luật khi không thực hiện đúng cam kết theo hợp đồng</p>

        <p style="font-size: 22px; margin-top: 30px;"><strong>PHẦN 2: QUYỀN VÀ NGHĨA VỤ CỦA BÊN B</strong></p>
        <p>_ Bên vay ( khách hàng) có nhiệm vụ cung cấp đầy đủ thông tin cá nhân, chứng minh thu nhập cá nhân</p>
        <p>_ Bên cho vay ( Công ty Tài Chính) có nghĩa vụ duyệt hồ sơ và cung cấp mật khẩu RÚT TIỀN cho bên vay</p>
        <p>_ Đuọc bên B thanh toán đầy đủ và đúng hạn tiền gốc và tiền phạt vi phạm hợp đồng, bồ thường thiệt hại và thanh toán trả nợ ( nếu có)</p>
        <p>_ Có thể ủy quyền cho bên thứ ba được chỉ định để thu hồi nợ gốc và thanh toán hợp đồng nếu bên B cố tình làm sai hợp đồng đã ký.</p>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <td style="text-align:center">
                        <p style="font-weight: bold;">BÊN VAY</p>
                        <small><i>(Ký họ tên)</i></small>
                        <p>{{ $data['fullname'] }}</p>
                    </td>
                    <td style="text-align:center">
                        <p style="font-weight: bold;">BÊN CHO VAY</p>
                        <img src="{{ asset('public/images/signature.jpg') }}" width="200px"/>
                    </td>
                    
                </tr>
            </thead>
        </table>
    </div>

</body>

</html>