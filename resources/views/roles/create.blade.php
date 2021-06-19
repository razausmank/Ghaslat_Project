<x-master title="Roles" :breadcrumbs="[ 'Roles' => 'role.index', 'New Role' => 'role.create'  ]">

    <x-flash />

    <x-cards.basic-card title="Create Role">
        <form action="{{ route('role.store') }}" method="POST">
        @csrf
            <div class="row ">
                <div class="form-group col-md-6">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Name"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Description</label>
                    <input type="text" name="label" class="form-control"  placeholder="Enter Description"/>
                </div>
            </div>

            <hr />
            <br />

            <select id="role_permissions" data-leftTitle="Available Permissions" data-rightTitle="Selected Permissions" name="permissions[]" class="dual-listbox dual_listbox_unique" multiple>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" >{{ $permission->label }}</option>
                @endforeach

            </select>

            <button type="submit" class=" btn btn-primary my-3 p-3 float-right btn-lg">Create Role</button>
        </form>
    </x-cards.basic-card>

    {{-- Scripts Section --}}
    <x-slot name="scripts">
       {{-- vendors --}}
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

        {{-- page scripts --}}
        <script src="{{ asset('assets/js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/dualListBox.js') }}" type="text/javascript"></script>
    </x-slot>

    {{-- Styles Section --}}
    <x-slot name="styles">
        <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    </x-slot>

</x-master>

