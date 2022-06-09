@extends('admin.layouts.master')

@section('title', 'Danh sách Khoản vay của thành viên')
@push('css')

<link rel="stylesheet" href="{{asset('public/admin/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{ route('admin.user.loan.amount.index') }}" class="btn btn-sm btn-outline-primary {{ !request()->filled('status') ? 'active' : '' }}">
                    Tất cả
                </a>
                <a href="{{ route('admin.user.loan.amount.index', ['status' => '0']) }}" class="btn btn-sm btn-outline-primary {{ request()->filled('status') && request()->status == 0 ? 'active' : '' }}">
                    Chưa xét duyệt
                </a>
                <a href="{{ route('admin.user.loan.amount.index', ['status' => '1']) }}" class="btn btn-sm btn-outline-primary {{ request()->filled('status') && request()->status == 1 ? 'active' : '' }}">
                    Đã xét duyệt
                </a>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold text-primary mb-0">Danh sách khoản vay thành viên</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã khoản vay</th>
                            <th>Tên thành viên</th>
                            <th>Số điện thoại</th>
                            <th>Khoản vay</th>
                            <th>Lãi suất</th>
                            <th>Trạng thái</th>
                            <th>Ngày đăng ký</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($user_loan_amount as $item)
                            @include('admin.user_loan_amount.row', ['item' => $item])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<form id="formDelete" action="" method="post">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('plugin-js')

<script src="{{asset('public/admin/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/admin/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endpush

@push('js')

<script>
    $(document).ready(function () {
        customDatatable('.table', [7]);
    });
</script>

@endpush