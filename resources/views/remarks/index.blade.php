<x-master>

    <x-flash />

    <x-cards.basic-card title="Remark " subtitle="List of all the Remarks" button_link="remark.create" button_text="New Remark">
        <table class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="remarks_table">

            <thead>
                <tr>
                    <th>Description</th>
                    <th>Entity ID</th>
                    <th>Entity Type</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($remarks as $remark)
                    <tr >
                        <td>{{ $remark->description }}</td>
                        <td>{{ $remark->entity_id }}</td>
                        <td>{{ $remark->entity_type->name }}</td>

                        <td>{{ $remark->created_at->diffForHumans() }}</td>
                        <td class="d-flex">
                            <a href="{{ route('remark.edit' , $remark) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>

                            <form action="{{ route('remark.destroy', $remark) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                    <i class="la la-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        </ul>

    </x-cards.basic-card>

</x-master>
