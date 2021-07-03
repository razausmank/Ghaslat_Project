<x-master title="Products" :breadcrumbs="[ 'Products' => 'product.index' ]">

    <x-flash />
    <div class="row">
    @foreach ($products as $product)

        <x-cards.product  :item="$product" />

    @endforeach
    </div>


</x-master>

