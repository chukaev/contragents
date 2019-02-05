@foreach($countries as $country)
    <tr>
        <td> {{ $country->name }} </td>
        <td> {{ \App\Enums\ProductStatuses::getStatusName($country->status) }} </td>
        <td> {{ $country->created_at }} </td>
        <td> {{ $country->updated_at }} </td>
        <td>
            <div class="btn-group-vertical">
                <a href="{{ route('admin_country_edit', ['id' => $country->id]) }}" type="button" class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>

            </div>
            <div class="btn-group-vertical">
                <a onclick="return confirm('Уверены, что хотите удалить?')"
                   href="{{ route('admin_country_delete', ['id' => $country->id]) }}" type="button" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
            </div>
        </td>
    </tr>
@endforeach

<section class="links-inside-table">
    <td colspan="5">{{ $countries->links() }}</td>
</section>