<x-master>

    <x-flash />

    <x-datatable.basic title="Products" button_link="product.create" button_text="New Product" table_id="products_list_datatable" >
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

</x-master>

