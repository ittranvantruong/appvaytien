@extends('admin.layouts.master')

@section('title', 'Quản lý thời gian vay')
@push('css')

<link rel="stylesheet" href="{{asset('public/admin/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}">

@endpush
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Thêm thời gian vay</h4>
                </div>
                <div class="card-body">
                    <form id="formAdd" action="{{ route('admin.loan.period.store') }}" method="post" data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label for="">Thời gian vay</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập thời gian vay" required
                                data-parsley-required-message="Trường này không được bỏ trống.">
                        </div>
                        <div class="form-group">
                            <label for="">Lãi suất (%)</label>
                            <input type="text" name="interest_rate" class="form-control" placeholder="Nhập lãi xuất" min="0" required data-parsley-type="number" 
                                data-parsley-required-message="Trường này không được bỏ trống." data-parsley-type-message="Trường này phải là số.">
                        </div>
                        <div class="form-group">
                            <label for="">Sắp xếp</label>
                            <input type="number" name="sort" class="form-control" min="0" placeholder="thứ tự" value="0"
                                required data-parsley-required-message="Trường này không được bỏ trống."
                                data-parsley-number-message="Trường này phải là số.">
                        </div>
                
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <form id="formMultiple" action="{{ route('admin.loan.period.multiple') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách thời gian vay</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group col-12 col-md-6 ml-auto mb-4">
                            <select class="form-control" name="action" required>
                                <option value="">Chọn hành động</option>
                                <option value="delete">Xóa</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Áp dụng</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width:30px;"><input type="checkbox" class="check-all"></th>
                                        <th>Thời gian vay</th>
                                        <th>Lãi suất</th>
                                        <th>Thứ tự</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loan_period as $item)
                                        @include('admin.loan_period.row', ['item' => $item])
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Sửa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpdate" action="{{ route('admin.loan.period.update') }}" method="post"
                    data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="">Thời gian vay</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập thời gian vay" required
                            data-parsley-required-message="Trường này không được bỏ trống.">
                    </div>
                    <div class="form-group">
                        <label for="">Lãi suất (%)</label>
                        <input type="text" name="interest_rate" class="form-control" placeholder="Nhập lãi xuất" min="0" required data-parsley-type="number" 
                            data-parsley-required-message="Trường này không được bỏ trống." data-parsley-type-message="Trường này phải là số.">
                    </div>
                    <div class="form-group">
                        <label for="">Sắp xếp</label>
                        <input type="number" name="sort" class="form-control" min="0" placeholder="thứ tự" value="0"
                            required data-parsley-required-message="Trường này không được bỏ trống."
                            data-parsley-number-message="Trường này phải là số.">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-js')

<script src="{{asset('public/admin/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/admin/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endpush

@push('js')

<script src="{{  asset('public/admin/js/loan_period.js') }}"></script>

<script>
    $(document).ready(function () {
        customDatatable('.table', [0, 4]);
    });
</script>

@endpush
