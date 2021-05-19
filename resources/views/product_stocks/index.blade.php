<x-master>

    <x-flash />

    <x-cards.basic-card title="Products Stock" button_link="productstock.create" button_text="Add/Remove Stock">
        <table class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="product_stocks_table">

            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Remark</th>
                    <th>Quantity</th>
                    <th>Product Category</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products_stock as $product_stock)
                    <tr >
                        <td><div>{{ $product_stock->product->id }}-{{ $product_stock->product->name }}</div><div >Remaining Quantity : {{ $product_stock->product->quantity }}</div></td>
                        <td>{{ $product_stock->remark->description ?? ''}}</td>
                        <td>{{ $product_stock->quantity }}</td>
                        <td>{{ $product_stock->product->product_category->name }}</td>
                        <td>{{ $product_stock->created_at->diffForHumans() }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        </ul>

    </x-cards.basic-card>

</x-master>
