@extends('admin.layouts.master')

@section('title', 'Danh sách thành viên')
@push('css')

<link rel="stylesheet" href="{{asset('public/admin/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-outline-primary {{ !request()->filled('type') ? 'active' : '' }}">
                    Tất cả
                </a>
                <a href="{{ route('admin.user.index', ['type' => '0']) }}" class="btn btn-sm btn-outline-primary {{ request()->filled('type') && request()->type == 0 ? 'active' : '' }}">
                    Chưa xác minh
                </a>
                <a href="{{ route('admin.user.index', ['type' => '1']) }}" class="btn btn-sm btn-outline-primary {{ request()->filled('type') && request()->type == 1 ? 'active' : '' }}">
                    Đã xác minh
                </a>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bold text-primary mb-0">Danh sách thành viên</h6>
            <a href="{{ route('admin.user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle fa-sm text-white-50"></i> Thêm thành viên</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên thành viên</th>
                            <th>Số điện thoại</th>
                            <th>Số CMND</th>
                            <th>Mật khẩu</th>
                            <th>CMND/CCCD mặt trước</th>
                            <th>CMND/CCCD mặt sau</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $item)
                            @include('admin.user.row', ['item' => $item])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<form id="formDeleteUser" action="" method="post">
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
        customDatatable('.table', [5]);
    });
</script>

@endpush