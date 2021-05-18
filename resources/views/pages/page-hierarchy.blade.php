<x-master>

    <x-cards.basic-card title="Pages Hierarchy" subtitle="This is how pages are arranged etc .">

        <x-form.form submit_button_id="page_hierarchy_js_tree_form_submit" reset_button_id="page_hierarchy_js_tree_form_reset">
            <x-slot name="form_tag">
                <form action="{{ route('page.update_page_hierarchy') }}" method="POST" id="page_hierarchy_form">
                    @csrf
                    @method('POST')
            </x-slot>

            <input type="hidden" name="page_hierarchy_json" value='{!! $pages !!}'  >
            <input type="hidden" name="page_hierarchy_csrf_token" value="{{ csrf_token() }}">
            <div id="kt_tree_5" class="tree-demo my-5">
            </div>

        </x-form.form>



    </x-cards.basic-card>



</x-master>

