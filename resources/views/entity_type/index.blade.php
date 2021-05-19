<x-master>

    <x-flash />

    <x-cards.basic-card title="Entity Type" subtitle="List of all the types of Entities" button_link="entitytype.create" button_text="New Entity Type">
        <table class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="entity_types_table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entity_types as $entity_type)
                    <tr >
                        <td>{{ $entity_type->id }}</td>
                        <td>{{ $entity_type->name }}</td>
                        <td>{{ $entity_type->description }}</td>
                        <td>{{ $entity_type->created_at->diffForHumans() }}</td>
                        <td class="d-flex">
                            <a href="{{ route('entitytype.edit' , $entity_type) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>

                            <form action="{{ route('entitytype.destroy', $entity_type) }}" method="POST">
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
