<x-master title="Roles" :breadcrumbs="[ 'Roles' => 'role.index', 'Edit Role' => '#'  ]">

    <x-flash />

    <x-cards.basic-card title="Update Role">
        <form action="{{ route('role.update', $role) }}" method="POST">
        @csrf
        @method('PATCH')
            <div class="row ">
                <div class="form-group col-md-6">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{ $role->name }}"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Description</label>
                    <input type="text" name="label" class="form-control"  placeholder="Enter Description" value="{{ $role->label }}"/>
                </div>
            </div>

            <hr />
            <br />

            <div class="row">
                <div class="col-md-6 col-sm-6">

                    <select id="role_permissions" data-leftTitle="Available Permissions" data-rightTitle="Selected Permissions" name="permissions[]" class="dual-listbox dual_listbox_unique" multiple>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}" {{ $role->permissions->pluck('id')->contains( $permission->id ) ? 'selected' : '' }}>{{ $permission->label }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-6 col-sm-6">
                    <select id="page_permissions" data-leftTitle="Available Pages" data-rightTitle="Selected Pages" name="pages[]" class="dual-listbox2 dual_listbox_unique2" multiple>
                        @foreach ($pages as $page)
                            <option value="{{ $page->id }}" {{ $role->pagePermissions->pluck('id')->contains( $page->id ) ? 'selected' : '' }}>{{ $page->label }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <button type="submit" class=" btn btn-primary my-3 p-3 float-right btn-lg">Update Role</button>
        </form>
    </x-cards.basic-card>

     {{-- Scripts Section --}}
     <x-slot name="scripts">

        <script src="{{ asset('assets/js/pagePermissionDualListBox.js') }}" type="text/javascript"></script>

    </x-slot>
</x-master>

