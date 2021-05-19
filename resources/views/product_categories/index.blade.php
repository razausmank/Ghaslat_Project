<x-master>

    <x-flash />

    <x-cards.basic-card title="All Product Categories" subtitle="List of all product categories" button_link="productcategory.create" button_text="New Product Category">


        <table  class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="product_categories_table" >
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>No. of Products </th>
                    <th>Created At</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </x-cards.basic-card>

</x-master>
