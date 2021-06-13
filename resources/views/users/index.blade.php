<x-master >

    <x-flash />

    <x-datatable.basic title="List of Users" button_text="Add New User" button_link="user.create" table_id="users_list_datatable" class="basic_datatable">
        <x-slot name="header">
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($users as $user)
                <tr role="row" class="odd">
                    <td class="dtr-control sorting_1" tabindex="0">{{ $user->name }}</td>
                    <td tabindex="0">{{ $user->email }}</td>
                    <td tabindex="0">{{ $user->created_at }}</td>
                    <td tabindex="0">{{ $user->updated_at }}</td>
                    <td nowrap="nowrap" tabindex="0">
                        <a href="{{ route('user.edit_user_roles', $user->id) }}" class="btn btn-primary ">Edit Roles</a>
                    </td>
                </tr>
            @endforeach

        </x-slot>
    </x-datatable.basic>

</x-master>

