<x-master>
    <x-cards.basic-card title="New Remark" subtitle="Add a Remark">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('remark.store') }}" method="POST" id="remark_create_form">
                    @csrf
                    @method('POST')
            </x-slot>


            <x-form.form_group label="Remark\Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Remark\Description" />
            </x-form.form_group>

            <x-form.form_group label="Entity Type" error="entity_type_id">
                <x-form.form_dropdown name="entity_type_id" id="remark_create_entity_category_select" :model="$entitytypes" />
            </x-form.form_group>

            <x-form.form_group label="Entity ID" error="entity_id">
                <x-form.form_input type="number" name="entity_id" placeholder="Enter Entity ID" />
            </x-form.form_group>

        </x-form.form>

    </x-cards.basic-card>

</x-master>
