<x-master title="Product Categories" :breadcrumbs="[ 'Product Categories' => 'productcategory.index' ]">
    <x-cards.product-category-show :item="$productcategory"/>

<div class="row">
    @foreach ($productcategory->products as $product)

        <x-cards.product-card info="info" info-bg="info" :item="$product" />

    @endforeach


</div>

</x-master>
