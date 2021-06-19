<x-master title="Product Categories" :breadcrumbs="[ 'Product Categories' => 'productcategory.index']">

    <x-flash />

    <x-datatable.basic title="List of Product Categories" button_link="productcategory.create" button_text="New Product Category" table_id="product_categories_list_datatable" >
        <x-slot name="header">
            <th>Name</th>
            <th>Description</th>
            <th>No. of Products </th>
            <th>Created At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($product_categories as $product_category)
                    <tr>
                        <td><a href="{{ route('productcategory.show' , $product_category ) }}">{{ $product_category->name }}</a></td>
                        <td>{{ $product_category->description }}</td>
                        <td>{{ $product_category->products->count() }}</td>
                        <td>{{ $product_category->created_at->diffForHumans() }}</td>
                        <td class="d-flex">
                            <a href="{{ route('productcategory.edit' , $product_category) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>

                            <form action="{{ route('productcategory.destroy', $product_category) }}" method="POST">
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
