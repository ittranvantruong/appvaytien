@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Về chúng tôi</h3>
        <h3 id="button_back"><a class="text-purple" href="{{url('./setting')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container" style="height: 1000px;">
        <p>Liên quan vụ việc 4 người trong cùng gia đình tử vong, theo thông tin ban đầu, anh N.H.H., 43 tuổi, được phát hiện tử vong tại phòng khách trong căn hộ ở tầng 28, Park 1, Park Hill, Khu đô thị Times City. Vợ anh H. là chị V.T.L., 43 tuổi, cùng 2 con 16 tuổi và 5 tuổi, tử vong tại phòng ngủ.</p>
        <p>Trước đó, khoảng 15h, một người thân đến quầy lễ tân toà Park 1 báo không liên hệ được với gia đình anh H. Ban quản lý toà nhà đã liên hệ tổ trưởng tổ dân phố cùng công an phường Mai Động tiến hành mở cửa kiểm tra thì phát hiện 4 người đều đã tử vong. </p>
    </div>
</main>
@endsection
