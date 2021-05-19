<x-master>
    <x-cards.basic-card title="New Entity Type" subtitle="Add a new type of Entity">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('entitytype.store') }}" method="POST" id="entity_type_create_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Entity Type Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Entity Type Name" />
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Entity Type's Description" />
            </x-form.form_group>
        </x-form.form>

    </x-cards.basic-card>

</x-master>
