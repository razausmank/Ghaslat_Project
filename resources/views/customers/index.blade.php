<x-master>

    <x-flash />

    <x-cards.basic-card title="Customers" subtitle="List of all the Customers" button_link="customer.create" button_text="New Customer">
        <table class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="customer_table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr >
                        <td class="d-flex text-align-center">
                            <div class="symbol symbol-circle symbol-sm-25 mr-4">
                                <img src="{{ $customer->image ? asset(Storage::url($customer->image)) : asset('assets/media/users/blank.png') }} " alt="image" />
                            </div>
                            <div>
                            {{ $customer->name }}
                            </div>
                        </td>
                        <td>{{ $customer->description}}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->created_at->diffForHumans() }}</td>
                        <td class="d-flex">
                            <a href="{{ route('customer.edit' , $customer) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>

                            <form action="{{ route('customer.destroy', $customer) }}" method="POST">
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

        </ul>

    </x-cards.basic-card>

</x-master>
