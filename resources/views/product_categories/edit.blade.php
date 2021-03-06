<x-master title="Product Categories" :breadcrumbs="[ 'Product Categories' => 'productcategory.index', 'Edit Product Category' => '#'  ]">

    <x-cards.basic-card title="Edit Product Category" >


        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('productcategory.update' , $productcategory ) }}" method="POST" enctype="multipart/form-data" id="product_category_edit_form">
                    @csrf
                    @method('PATCH')
            </x-slot>

            <x-form.form_group label="Category Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Product Category name" value="{{ $productcategory->name }}"/>
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea name="description" placeholder="Enter Product Category Description" value="{{ $productcategory->description }}"/>
            </x-form.form_group>

            <x-form.form_group label="Image" error="image">
                <x-form.form_image_input id="image_field" name="image" add_title="Add Product Category Image" remove_title="Remove Product Category Image" :image="$productcategory->image"/>
            </x-form.form_group>


        </x-form.form>


    </x-cards.basic-card>

</x-master>


