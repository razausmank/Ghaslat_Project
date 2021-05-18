<x-master>

    <x-cards.basic-card title="New Page" subtitle="Yo man this was hard">

        <x-form.form >
            <x-slot name="form_tag">
                <form action="{{ route('page.store') }}" method="POST" id="page_create_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <x-form.form_group label="Name" error="name">
                <x-form.form_input type="text" name="name" placeholder="Enter Page Name" />
            </x-form.form_group>

            <x-form.form_group label="URL" error="url">

                <x-form.form_dropdown name="url" id="create_page_url_select" >

                    <x-slot name="custom_element">
                        <option value="#">No Route</option>
                        @foreach ($routes as $route)
                            <option value="{{ $route }}"> {{ $route}} </option>
                        @endforeach
                    </x-slot>

                </x-form.form_dropdown>

            </x-form.form_group>

            <x-form.form_group label="Description" error="description">
                <x-form.form_input type="text" name="description" placeholder="Enter Page Description" />
            </x-form.form_group>

            <x-form.form_group label="Sort Order" error="sort_order">
                <x-form.form_input type="number" name="sort_order" placeholder="Enter Page Sort Order" />
            </x-form.form_group>

            <x-form.form_group label="Parent Page" error="parent_page_id">
                <x-form.form_dropdown name="parent_page_id" id="create_page_parent_page_select" :model="$pages" dropdown_default_option="No Parent Page" />
            </x-form.form_group>

        </x-form.form>



    </x-cards.basic-card>

</x-master>
