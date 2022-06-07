@extends('admin.layouts.master')

@section('title', 'Cài đặt')
@push('css')
<link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">
@endpush

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
<form action="{{ route('admin.setting.store') }}" class="row" method="post" data-parsley-validate>
    @csrf
    <button type="submit" class="ml-auto btn btn-primary">Lưu lại</button>
    @foreach ($settings as $item)
    @if($item->type_input == 0)
    <div class="col-12">
        <div class="form-group">
            <label for="">{{ __('setting.'.$item->key) }}</label>
            <input type="text" name="{{ $item->key }}" class="form-control" placeholder="Nhập tiêu đề tour"
                required data-parsley-required-message="Trường này không được bỏ trống."
                value="{{ $item->plain_value }}">
        </div>
    </div>
    @elseif($item->type_input == 1)
    <div class="col-12 col-md-12 form-group">
        <label for="">{{ __('setting.'.$item->key) }}</label>
        <textarea name="{{ $item->key }}" class="form-control">{!! $item->plain_value !!}</textarea>
    </div>
    @elseif($item->type_input == 2)
    <div class="col-12 col-md-12 form-group">
        <label for="">{{ __('setting.'.$item->key) }}</label>
        <textarea name="{{ $item->key }}" class="form-control ckeditor">{!! $item->plain_value !!}</textarea>
    </div>
    @elseif($item->type_input == 3)
    <div class="col-12 col-md-12 form-group overflow-hidden">
        <label for="">{{ __('setting.'.$item->key) }}</label>
        <input type="text" class="form-control d-none" name="{{ $item->key }}" value="{{ $item->plain_value }}">
        <img id="avatar" class="add-image-ckfinder pointer" data-preview="#avatar"
            data-input="input[name='{{ $item->key }}']" data-type=""
            src="{{asset($item->plain_value)}}">
    </div>
    @endif
    @endforeach
    <button type="submit" class="btn btn-primary">Lưu lại</button>
</form>

</div>
<!-- End of Main Content -->

@endsection

@push('plugin-js')

<script src="{{ asset('public/admin/plugins/ckfinder/ckfinder.js') }}"></script>
<script src="{{ asset('public/admin/plugins/ckeditor/ckeditor.js') }}"></script>

@endpush

@push('js')

@endpush