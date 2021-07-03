<x-master title="Product Categories" :breadcrumbs="[ 'Product Categories' => 'productcategory.index' ]">

    <div class="row">

        @foreach ($product_categories as $product_category)

            <x-cards.product-category info="info" info-bg="info" :item="$product_category" />

        @endforeach


    </div>

    </x-master>
