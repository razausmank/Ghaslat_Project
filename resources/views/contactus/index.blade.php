<x-master title="Contact Us" :breadcrumbs="[ 'Messages' => 'contactus.index']">

    <x-flash />
    <div class="card card-custom">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">Messages</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_2">Unread</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">Read</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_2">All</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_2" role="tabpanel">
                    <x-datatable.basic title="Unread Messages" table_id="unread_messages_list_datatable">
                        <x-slot name="header">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </x-slot>

                        <x-slot name="body">

                            @foreach ($messages as $message)
                                @if ($message->unread())
                                    <tr>
                                        <td>{{ $message->notifiable->name }}</td>
                                        <td>{{ $message->notifiable->email }}</td>
                                        <td>{{ $message->notifiable->message }}</td>
                                        <td>{{ $message->notifiable->created_at->diffForHumans() }}</td>
                                        <td class="d-flex">


                                            <form action="{{ route('contactus.destroy', $message->notifiable) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-clean btn-icon"
                                                    title="Delete">
                                                    <i class="la la-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endif
                            @endforeach

                        </x-slot>
                    </x-datatable.basic>
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_2_2" role="tabpanel">
                    <x-datatable.basic title="Read Messages" table_id="read_messages_list_datatable">
                        <x-slot name="header">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </x-slot>

                        <x-slot name="body">

                            @foreach ($messages as $message)
                                @if ($message->read())
                                    <tr>
                                        <td>{{ $message->notifiable->name }}</td>
                                        <td>{{ $message->notifiable->email }}</td>
                                        <td>{{ $message->notifiable->message }}</td>
                                        <td>{{ $message->notifiable->created_at->diffForHumans() }}</td>
                                        <td class="d-flex">


                                            <form action="{{ route('contactus.destroy', $message->notifiable) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-clean btn-icon"
                                                    title="Delete">
                                                    <i class="la la-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endif
                            @endforeach

                        </x-slot>
                    </x-datatable.basic>
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_3_2" role="tabpanel">
                    <x-datatable.basic title="All Messages" table_id="messages_list_datatable">
                        <x-slot name="header">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </x-slot>

                        <x-slot name="body">

                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->notifiable->name }}</td>
                                    <td>{{ $message->notifiable->email }}</td>
                                    <td>{{ $message->notifiable->message }}</td>
                                    <td>{{ $message->read() ? 'read' : 'unread' }}</td>
                                    <td>{{ $message->notifiable->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">


                                        <form action="{{ route('contactus.destroy', $message->notifiable) }}"
                                            method="POST">
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
                </div>
            </div>
        </div>
    </div>
</x-master>
