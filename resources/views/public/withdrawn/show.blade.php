@extends('public.layouts.master')
@section('title', 'Cài đặt')
@push('css')
<link href="{{ asset('public/css/setting.css') }}" rel="stylesheet" type="text/css">
@endpush
@section('content')
<main>
    <header class="position-relative p-0">
        <h3 class="text-center text-uppercase text-purple p-3">Lịch sử rút tiền</h3>
        <h3 id="button_back"><a class="text-purple" href="{{ route('profile.index') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></h3>
    </header>
    
    <div class="container">
        <div class="alert alert-light">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>
                        Số tiền
                    </th>
                    <th>Thời gian</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody>
                    @foreach($user->withdrawns as $item)
                        <tr>
                            <td>
                                {{number_format($item->amount)}}
                            </td>
                            <th>
                                {{date('H:i:s d/m/Y', strtotime($item->created_at))}}
                            </th>
                            <th>
                                {!!formatStatusWithdrawn($item->status)!!}
                            </th>
                        </tr>
                        @if($item->status == 2)
                        <tr class="bg-dark text-light">
                            <td colspan="3">Lý do: {{$item->note}}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="m-2">
    </div>
</main>
@endsection
