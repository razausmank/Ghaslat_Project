<x-master title="Users" :breadcrumbs="[ 'Users' => 'user.index', 'Edit User Roles' => '#'  ]">

    <x-flash />

<x-cards.basic-card title="Edit {{ $user->name }}'s Roles">
    <form action="{{ route('user.update_user_roles', $user->id) }}" method="POST">
    @csrf
        <select id="user_roles" name="roles[]" data-leftTitle="Available Roles" data-rightTitle="Selected Roles" class="dual-listbox dual_listbox_unique" multiple>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $user->roles->pluck('id')->contains( $role->id ) ? 'selected' : '' }}>{{ $role->label }}</option>
            @endforeach

        </select>

        <button type="submit" class=" btn btn-primary my-3 p-3 float-right btn-lg">Update Changes</button>
    </form>
</x-cards.basic-card>

</x-master>

