<tr>
    <td>{{$item->info->fullname}}</td>
    <td>{{$item->phone}}</td>
    <td>{{$item->info->identity_number}}</td>
    <td>{{$item->info->education}}</td>
    <td>{{$item->info->purpose}}</td>
    <td>{!! $item->verified ? '<span class="text-success">Đã xác minh</span>' : 'Chưa xác minh' !!}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn-delete btn btn-sm btn-danger"
                data-target="#formDeleteUser"
                data-action="{{ route('admin.user.delete', $item->id) }}">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>
</tr>