<x-master title="Customers" :breadcrumbs="[ 'Customers' => 'customer.index' ]">

    <x-flash />
    <x-datatable.basic title="List of Customers" table_id="customers_list_datatable">
        <x-slot name="header">
            <th>Name</th>
            <th>No. of Orders</th>
            <th>Description</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
        </x-slot>

        <x-slot name="body">
            @foreach ($customers as $customer)
                <tr>
                    <td class="d-flex text-align-center">
                        <div class="symbol symbol-circle symbol-sm-25 mr-4">
                            <img src="{{ $customer->image ? asset(Storage::url($customer->image)) : asset('assets/media/users/blank.png') }} "
                                alt="image" />
                        </div>
                        <div>
                            {{ $customer->name }}
                        </div>
                    </td>
                    <td>{{ $customer->orders->count() }}</td>
                    <td>{{ $customer->description }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->created_at->diffForHumans() }}</td>

                </tr>
            @endforeach

        </x-slot>
    </x-datatable.basic>

</x-master>
