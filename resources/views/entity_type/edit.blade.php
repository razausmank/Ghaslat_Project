<x-master>
    <x-cards.basic-card title="Edit Entity Type" >

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('entitytype.update', $entitytype ) }}" method="POST" id="entity_type_edit_form">
                    @csrf
                    @method('PATCH')
            </x-slot>

            <x-form.form_group label="Entity Type Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Entity Type Name" value="{{ $entitytype->name }}" />
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Entity Type's Description" value="{{ $entitytype->description }}" />
            </x-form.form_group>
        </x-form.form>

    </x-cards.basic-card>

</x-master>
