<tr>
    <td>{{$item->code}}</td>
    <td><a href="{{ route('admin.user.edit', $item->user_id ?? 0) }}" target="_blank">{{$item->fullname}}</a></td>
    <td>{{$item->phone}}</td>
    <td>{{$item->loan_amount}} - {{$item->loan_period}}</td>
    <td>{{$item->interest_rate}} %</td>
    <td>{{!$item->loan_limit ? 'chưa cấp' : number_format($item->loan_limit)}}</td>
    <td>{!! $item->status ? '<span class="text-success">Đã xét duyệt</span>' : 'Chưa xét duyệt' !!}</td>
    <td>{{date('d/m/Y', strtotime($item->created_at))}}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="{{ route('admin.user.loan.amount.edit', $item->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn-delete btn btn-sm btn-danger"
                data-target="#formDelete"
                data-action="{{ route('admin.user.loan.amount.delete', $item->id) }}">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>
</tr>