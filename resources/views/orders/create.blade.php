<x-master>
    <x-cards.basic-card title="New Order" subtitle="Add a new Order">

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('order.store') }}" method="POST" id="order_create_form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Address" error="address">
                <x-form.form_textarea type="text" name="address" placeholder="Enter Customer's Address " />
            </x-form.form_group>

            <x-form.form_group label="Customer" error="customer_id">
                <x-form.form_dropdown name="customer_id" id="customer_id_select" :model="$customers" />
            </x-form.form_group>

            <x-form.form_repeater title='Items' id="item_list_repeater" data_repeater_list="items_list" class="col-md-12" parent_class="">
                <div class="col-md-6">
                    <label>Item:</label>
                    <x-form.form_dropdown name="product_id" id="product_id" :model="$products" custom_attributes="required"  />
                    <x-form.form_field_error field="product_id" />
                </div>
                <div class="col-md-4">
                    <label>Quantity:</label>
                    <input type="number" name="product_qty" class="form-control"  min="1" value="1" required/>
                    <x-form.form_field_error field="product_qty" />
                    <div class="d-md-none mb-2"></div>
                </div>


            </x-form.form_repeater>

        </x-form.form>

    </x-cards.basic-card>

</x-master>
