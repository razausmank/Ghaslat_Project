<x-master >

    <x-flash />

    <x-datatable.basic title="List of Roles" button_text="Add New Role" button_link="role.create" table_id="roles_list_datatable" >
        <x-slot name="header">
            <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 43px;" aria-sort="ascending" aria-label="Record ID: activate to sort column descending">Name</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 34px;" aria-label="Order ID: activate to sort column ascending">Description</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 34px;" aria-label="Order ID: activate to sort column ascending">No. of Permissions</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 55px;" aria-label="Country: activate to sort column ascending">Created At</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Ship City: activate to sort column ascending">Updated At</th>
            <th class="sorting_disabled" tabindex="0" rowspan="1" colspan="1" style="width: 106px;" aria-label="Actions">Actions</th>
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

    {{-- Scripts Section --}}
    <x-slot name="scripts">
        {{-- vendors --}}
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

        {{-- page scripts --}}
        <script src="{{ asset('assets/js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
    </x-slot>

    {{-- Styles Section --}}
    <x-slot name="styles">
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    </x-slot>

</x-master>



