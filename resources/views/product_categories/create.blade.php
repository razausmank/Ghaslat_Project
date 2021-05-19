<x-master>

    <x-cards.basic-card title="New Product Category" subtitle="A new world order blah blah ">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('productcategory.store') }}" method="POST" enctype="multipart/form-data" id="product_category_create_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Category Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Product Category name" />
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Product Category Description"/>
            </x-form.form_group>

            <x-form.form_group label="Image" error="image">
                <x-form.form_image_input id="image_field" name="image" add_title="Add Product Category Image" remove_title="Remove Product Category Image" />
            </x-form.form_group>


        </x-form.form>


    </x-cards.basic-card>

</x-master>
