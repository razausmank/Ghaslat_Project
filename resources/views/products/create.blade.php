<x-master  title="Products" :breadcrumbs="[ 'Products' => 'product.index', 'New Product' => 'product.create'  ]">

    <x-cards.basic-card title="New Product" >

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" id="product_create_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Product Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Product name" />
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Product Description" />
            </x-form.form_group>


            <x-form.form_group label="Price" error="price">
                <x-form.form_input type="number" custom_attributes='step=0.01' name="price" placeholder="Enter Product Price" />
            </x-form.form_group>


            <x-form.form_group label="Product Category" error="product_category_id">
                <x-form.form_dropdown name="product_category_id" id="product_create_product_category_select" :model="$product_categories" />
            </x-form.form_group>

            <x-form.form_group label="Image" error="image">
                <x-form.form_image_input id="image_field" name="image" add_title="Add Product Image" remove_title="Remove Product Image" />
            </x-form.form_group>


            {{-- refactor this into a component later  --}}
            <x-form.form_group label="Is this is a Package?" error="is_package">
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-primary">
                                <input type="radio" name="is_package" value="1"/>
                                <span></span>
                                Yes
                            </label>
                            <label class="checkbox checkbox-primary">
                                <input type="radio" name="is_package" value="0" checked="checked" />
                                <span></span>
                                No
                            </label>

                        </div>
            </x-form.form_group>


        </x-form.form>

    </x-cards.basic-card>

</x-master>
