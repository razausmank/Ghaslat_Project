<x-master>
    <x-cards.basic-card title="Edit Remark" subtitle="Edit Remark">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('remark.update', $remark ) }}" method="POST" id="remark_edit_form">
                    @csrf
                    @method('PATCH')
            </x-slot>


            <x-form.form_group label="Remark\Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Remark\Description" value="{{ $remark->description }}"/>
            </x-form.form_group>

            <x-form.form_group label="Entity Type" error="entity_type_id">
                <x-form.form_dropdown name="entity_type_id" id="remark_create_entity_category_select" :model="$entitytypes" :modeledit="$remark->entity_type_id"/>
            </x-form.form_group>

            <x-form.form_group label="Entity ID" error="entity_id">
                <x-form.form_input type="number" name="entity_id" placeholder="Enter Entity ID" value="{{ $remark->entity_id }}"/>
            </x-form.form_group>

        </x-form.form>

    </x-cards.basic-card>

</x-master>
