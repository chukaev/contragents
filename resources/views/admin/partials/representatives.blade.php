@foreach($representatives as $representative)
    <tr>
        <td> {{ $representative->last_name }} </td>
        <td> {{ $representative->first_name }} </td>
        <td> {{ $representative->middle_name }} </td>
        <td> {{ $representative->passport }} </td>
        <td> {{ $representative->signer_last_name }} </td>
        <td> {{ $representative->signer_first_name }} </td>
        <td> {{ $representative->signer_middle_name }} </td>
        <td> {{ $representative->company_full_name }} </td>
        <td> {{ $representative->company_brief_name }} </td>
        <td> {{ $representative->inn }} </td>
        <td> {{ $representative->kpp }} </td>
        <td> {{ $representative->ogrn }} </td>
        <td> {{ $representative->type }} </td>
        <td> {{ $representative->created_at }} </td>
        <td> {{ $representative->updated_at }} </td>
        <td>
            <div class="btn-group-vertical">
                <a href="{{ route('admin_representative_edit', ['id' => $representative->id]) }}" type="button" class="btn btn-warning"> <i class="fa fa-pencil"></i> </a>

            </div>
            <div class="btn-group-vertical">
                <a onclick="return confirm('Уверены, что хотите удалить?')"
                   href="{{ route('admin_representative_delete', ['id' => $representative->id]) }}" type="button" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
            </div>
        </td>
    </tr>
@endforeach

<section class="links-inside-table">
    <td colspan="5">{{ $representatives->links() }}</td>
</section>