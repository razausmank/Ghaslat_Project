<x-master >

    <x-flash />

    <x-cards.basic-card title="Create User">
        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('user.store') }}" method="POST" id="user_create_form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="User Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Customer Name" />
            </x-form.form_group>

            <x-form.form_group label="Email" error="email">
                <x-form.form_input type="email" name="email" placeholder="Someone@example.com" />
            </x-form.form_group>

            <x-form.form_group label="Password" error="password">
                <x-form.form_input type="password" name="password" placeholder="Enter User's Password" />
            </x-form.form_group>

            <x-form.form_group label="Password Confirmation" error="password_confirmation">
                <x-form.form_input type="password" name="password_confirmation" placeholder="Password Confirmation" />
            </x-form.form_group>
            <br />
            <hr />
            <h4>Roles</h4>
            <hr />
            <br />
            <select id="user_roles" data-leftTitle="Available Permissions" data-rightTitle="Selected Permissions" name="roles[]" class="dual-listbox dual_listbox_unique" multiple>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" >{{ $role->label }}</option>
                @endforeach
            </select>

        </x-form.form>
    </x-cards.basic-card>

</x-master>

