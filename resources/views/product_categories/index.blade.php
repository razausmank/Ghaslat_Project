<x-master title="Product Categories" :breadcrumbs="[ 'Product Categories' => 'productcategory.index']">
    <x-slot name="custom_sub_header">

        <input data-switch="true" type="checkbox" checked="checked" data-on-text="List" data-handle-width="50" data-off-text="Tiles" data-on-color="success" data-off-color="primary"/>

    </x-slot>

    <x-flash />
    <div id="list_datatable_grid" class="switch_list">
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
    </div>
    <div  class="switch_tiles d-none">

    <div class="card card-custom gutter-b ">
        <div class="card-header">
            <div class="card-title ">
                <h3 class="card-label">
                    Product Categories
                </h3>
            </div>
            <div class="card-title">

                    <a href="{{ route('productcategory.create') }}" class="btn btn-primary mr-2"> New Product Category</a>
            </div>

        </div>
    </div>

    <div class="card card-custom bg-transparent gutter-b  ">

        <div class="row mt-4">

            @foreach ($product_categories as $product_category)

                <x-cards.product-category info="info" info-bg="info" :item="$product_category" />

            @endforeach


        </div>
    </div>
    </div>




</x-master>
