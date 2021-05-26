<x-master>
    <x-cards.basic-card title="New Package" subtitle="Add a new Package">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('package.store') }}" method="POST" id="package_create_form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Package Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Package Name" />
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea type="text" name="description" placeholder="Enter Description" />
            </x-form.form_group>

            <x-form.form_group label="Price" error="price">
                <x-form.form_input type="number" custom_attributes='step=0.01' name="price" placeholder="Enter Package's Price " />
            </x-form.form_group>



            <x-form.form_group label="Image" error="image">
                <x-form.form_image_input id="image_field" name="image" add_title="Add Package Image" remove_title="Remove Package Image" />
            </x-form.form_group>

        </x-form.form>

    </x-cards.basic-card>

</x-master>
