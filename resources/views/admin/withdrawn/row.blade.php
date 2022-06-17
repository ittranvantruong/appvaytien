<tr>
    <td><a href="{{ route('admin.user.edit', $item->user->id ?? 0) }}" target="_blank">{{$item->user->info()->value('fullname')}}</a></td>
    <td>{{$item->user->phone}}</td>
    <td>{{number_format($item->amount)}}</td>
    <td>{!!formatStatusWithdrawn($item->status)!!}</td>
    <td>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="{{ route('admin.withdrawn.edit', $item->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    </td>
</tr>