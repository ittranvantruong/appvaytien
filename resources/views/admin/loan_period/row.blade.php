<tr class="item-{{$item->id}}">
    <td>@if($item->id != 1)<input type="checkbox" class="check-list" name="id[]" value="{{$item->id}}">@endif
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->interest_rate}} %</td>
    <td>{{$item->sort}}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="button" class="open-modal edit-load btn btn-sm btn-warning" data-modal="#modalEdit"
                data-url="{{ route('admin.loan.period.edit', $item->id) }}">
                <i class="fas fa-edit"></i>
            </button>
            @if($item->id != 1)
            <button type="button" class="delete btn btn-sm btn-danger"
                data-action="{{ route('admin.loan.period.delete', $item->id) }}">
                <i class="fas fa-trash"></i>
            </button>
            @endif
        </div>
    </td>
</tr>