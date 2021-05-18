<x-master >

    <x-flash />

    <x-cards.basic-card title="All Pages" subtitle="List of all pages" button_link="page.create" button_text="New Page">
        <table  class="table table-bordered table-hover table-checkable dataTable dtr-inline" style="width:100%" id="page_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Description</th>
                    <th>Sort Order</th>
                    <th>Parent Page Id</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)

                    <tr>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->url }}</td>
                        <td>{{ $page->description }}</td>
                        <td>{{ $page->sort_order }}</td>
                        <td>{{ $page->parent_page_id }}</td>
                        <td>{{ $page->created_at->diffForHumans() }}</td>
                        <td class="d-flex">
                            <a href="{{ route('page.edit' , $page) }}" class="btn btn-sm btn-clean btn-icon" title="Edit">
                                <i class="la la-edit"></i>
                            </a>

                            <form action="{{ route('page.destroy', $page) }}" method="POST">
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




    </x-cards.basic-card>

</x-master>



