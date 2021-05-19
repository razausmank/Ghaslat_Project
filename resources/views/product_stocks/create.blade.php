<x-master>
    <x-cards.basic-card title="Add / Remove Stock" >

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('productstock.store') }}" method="POST" id="productstock_create_form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Product" error="product_id">
                <x-form.form_dropdown name="product_id" id="product_stock_create_product_select" :model="$products" />
            </x-form.form_group>

            <x-form.form_group label="Quantity" error="quantity">
                <x-form.form_input type="number" name="quantity" placeholder="Quantity" />
            </x-form.form_group>

            <x-form.form_group label="Remarks" error="remark">
                <x-form.form_textarea type="text" name="remark" placeholder="Remarks" />
            </x-form.form_group>

        </x-form.form>

    </x-cards.basic-card>

</x-master>
