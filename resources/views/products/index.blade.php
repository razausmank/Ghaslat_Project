<x-master title="Products" :breadcrumbs="[ 'Products' => 'product.index' ]">

    <x-slot name="custom_sub_header">

        <input data-switch="true" type="checkbox" checked="checked" data-on-text="List" data-handle-width="50" data-off-text="Tiles" data-on-color="success" data-off-color="primary"/>

    </x-slot>

    <x-flash />

    <div id="list_datatable_grid" class="switch_list">

    <x-datatable.basic title="List of Products" button_link="product.create" button_text="New Product" table_id="products_list_datatable" >
        <x-slot name="header">
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Product Category</th>
            <th>Package</th>
            <th>Active</th>
            <th>Created At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description ? $product->description : '---' }}</td>
                <td>{{ $product->price  }}</td>
                <td>{{ $product->product_category->name }}</td>

                <td>{{ $product->is_package ? "Yes" : "No" }}</td>
                <td>{{ $product->is_active ? "Yes" : "No" }}</td>

                <td>{{ $product->created_at->diffForHumans() }}</td>
                <td class="d-flex">
                    <a href="{{ route('product.edit' , $product) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>
                    @if(! $product->is_active )
                    <form action="{{ route('product.activate', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Activate">
                            <i class="la flaticon2-plus"></i>
                        </button>
                    </form>
                    @else

                    <form action="{{ route('product.deactivate', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Deactivate">
                            <i class="la flaticon2-delete"></i>
                        </button>
                    </form>
                    @endif
                    <form action="{{ route('product.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-clean btn-icon" title="Delete">
                            <i class="la la-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>
        @endforeach

        </x-slot>
    </x-datatable.basic>
    </div>


    <div  class="switch_tiles d-none">

        <div class="card card-custom gutter-b ">
            <div class="card-header">
                <div class="card-title ">
                    <h3 class="card-label">
                        Products
                    </h3>
                </div>
                <div class="card-title">

                        <a href="{{ route('product.create') }}" class="btn btn-primary mr-2"> New Product</a>
                </div>

            </div>
        </div>

        <div class="card card-custom bg-transparent gutter-b  ">

            <div class="row mt-4">

                @foreach ($products as $product)

                <x-cards.product  :item="$product" />

                @endforeach


            </div>
        </div>
        </div>
</x-master>

