<x-master>

    <x-flash />

    <x-cards.basic-card title="Packages" subtitle="List of all the Customers" button_link="package.create" button_text="New Customer">
        <table class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="package_table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr >
                        <td class="d-flex text-align-center">
                            <div class="symbol symbol-circle symbol-sm-25 mr-4">
                                <img src="{{ $package->image ? asset(Storage::url($package->image)) : asset('assets/media/users/blank.png') }} " alt="image" />
                            </div>
                            <div>
                            {{ $package->name }}
                            </div>
                        </td>
                        <td>{{ $package->description}}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->created_at->diffForHumans() }}</td>
                        <td class="d-flex">
                            <a href="{{ route('package.edit' , $package) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>

                            <form action="{{ route('package.destroy', $package) }}" method="POST">
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
