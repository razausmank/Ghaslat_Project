<x-master title="Roles" :breadcrumbs="[ 'Roles' => 'role.index']">

    <x-flash />

    <x-datatable.basic title="List of Roles" button_text="Add New Role" button_link="role.create" table_id="roles_list_datatable" >
        <x-slot name="header">
            <th>Name</th>
            <th>Description</th>
            <th>No. of Permissions</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($roles as $role)
                <tr role="row" class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">{{ $role->name }}</td>
                    <td tabindex="0">{{ $role->label }}</td>
                    <td tabindex="0">{{ count($role->permissions) }}</td>
                    <td tabindex="0">{{ $role->created_at }}</td>
                    <td tabindex="0">{{ $role->updated_at }}</td>
                    <td nowrap="nowrap" class="d-flex " tabindex="0">
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-primary mr-3">Edit Roles</a>
                        <form action="{{ route('role.destroy', $role) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach

        </x-slot>
    </x-datatable.basic>



</x-master>



