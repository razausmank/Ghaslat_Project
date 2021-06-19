<x-master title="Customers" :breadcrumbs="[ 'Customers' => 'customer.index' , 'Edit Customer' => '#' ]">
    <x-cards.basic-card title="Edit Customer" >

        <x-form.form>
            <x-slot name="form_tag">
                <form action="{{ route('customer.update' , $customer ) }}" method="POST" id="customer_update_form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
            </x-slot>

            <x-form.form_group label="Customer Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Customer Name" value="{{ $customer->name }}" />
            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_textarea type="text" name="description" placeholder="Enter Description" value="{{ $customer->description }}"/>
            </x-form.form_group>

            <x-form.form_group label="Email" error="email">
                <x-form.form_input type="email" name="email" placeholder="Someone@example.com" value="{{ $customer->email }}"/>
            </x-form.form_group>

            <x-form.form_group label="Phone" error="phone">
                <x-form.form_input type="text" name="phone" placeholder="Enter Customer's Phone Number " value="{{ $customer->phone }}"/>
            </x-form.form_group>

            <x-form.form_group label="Address" error="address">
                <x-form.form_textarea type="text" name="address" placeholder="Enter Customer's Address " value="{{ $customer->address }}"/>
            </x-form.form_group>

            <x-form.form_group label="Image" error="image">
                <x-form.form_image_input id="image_field" :image="$customer->image" name="image" add_title="Add Customer Image" remove_title="Remove Customer Image" />
            </x-form.form_group>

        </x-form.form>

    </x-cards.basic-card>

</x-master>
