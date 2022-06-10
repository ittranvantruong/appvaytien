@extends('public.layouts.master')
@section('title', 'Xác minh danh tính')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Xác minh tên thật</h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('profile') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>

    <div class="container">
        <a href="{{ route('info.persional') }}">
            <div class="row">
                <span>Thông tin cá nhân
                    <span class="text-muted float-end">
                        @if ( ($user->email && $user->info->fullname) != null && $user->verified == 0)
                        Chờ duyệt
                        @elseif ($user->verified == 1)
                        Thành công
                        @else
                        Chưa hoàn thành
                        @endif
                        <i class="fa fa-chevron-right"></i></span>
                </span>
            </div>
        </a>
    </div>

    <div class="container">
        <a href="{{ route('info') }}">
            <div class="row">
                <span>Thông tin 
                    <span class="text-muted float-end">
                        @if ( ($user->info->education && $user->info->personal_income &&
                            $user->info->purpose) != null && $user->verified == 0)
                        Chờ duyệt
                        @elseif ($user->verified == 1)
                        Thành công
                        @else
                        Chưa hoàn thành
                        @endif
                        <i class="fa fa-chevron-right"></i></span>
                </span>
            </div>
        </a>
    </div>

    <div class="container">
        <a href="{{ route('bank') }}">
            <div class="row">
                <span>Thẻ ngân hàng
                    <span class="text-muted float-end">
                        @if ( ($user->bank->name && $user->bank->number &&
                            $user->bank->identity_number && 
                            $user->bank->name_owner) != null && $user->verified == 0)
                        Chờ duyệt
                        @elseif ($user->verified == 1)
                        Thành công
                        @else
                        Chưa hoàn thành
                        @endif
                        <i class="fa fa-chevron-right"></i></span>
                </span>
            </div>
        </a>
    </div>

    <div class="container">
        <a href="{{ route('phone') }}">
            <div class="row">
                <span>Điện thoại xác thực
                    <span class="text-muted float-end">
                        @if ($user->verified == 1)
                        Thành công 
                        @else
                        Chờ duyệt
                        @endif
                        <i class="fa fa-chevron-right"></i></span>
                </span>
            </div>
        </a>
    </div>
</main>
@endsection
