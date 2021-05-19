<x-master>

<div class="row">

    @foreach ($productcategory->products as $product)

        <x-cards.product-card info="info" info-bg="info" :item="$product" />

    @endforeach


</div>

</x-master>
