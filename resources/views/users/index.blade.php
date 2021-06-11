<x-master >

    <x-flash />

    <x-datatable.basic title="List of Users" button_text="Add New User" button_link="user.create" table_id="users_list_datatable" class="basic_datatable">
        <x-slot name="header">
            <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 43px;" aria-sort="ascending" aria-label="Record ID: activate to sort column descending">Name</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 34px;" aria-label="Order ID: activate to sort column ascending">Email</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 55px;" aria-label="Country: activate to sort column ascending">Created At</th>
            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Ship City: activate to sort column ascending">Updated At</th>
            <th class="sorting_disabled" tabindex="0" rowspan="1" colspan="1" style="width: 106px;" aria-label="Actions" >Actions</th>
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

