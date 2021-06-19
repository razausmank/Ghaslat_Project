<x-master title="Orders" :breadcrumbs="[ 'Orders' => 'order.index'  ]">

    <x-flash />
    <x-datatable.basic title="List of Orders"  button_link="order.create" button_text="New Order" table_id="orders_list_datatable" >
        <x-slot name="header">
            <th>Address</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>No. of Items</th>
            <th>Customer Name</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($orders as $order)
            <tr >

                <td>{{ $order->address}}</td>
                <td>{{ $order->status}}</td>
                <td>{{ $order->total_price }}</td>
                <td> --</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                <td>{{ $order->updated_at->diffForHumans() }}</td>
                <td class="d-flex">
                    <a href="{{ route('order.edit' , $order) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                        <i class="la la-edit"></i>
                    </a>

                    <form action="{{ route('order.destroy', $order) }}" method="POST">
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
