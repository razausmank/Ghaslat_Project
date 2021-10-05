<x-master title="Contact Us" :breadcrumbs="[ 'Messages' => 'contactus.index', 'Message' => '#'  ]">
    <x-cards.basic-card title="Contact Us Message">
        <div class="row justify-content-center py-4 px-8 py-lg-7 px-lg-10">
            <div class="col-xl-12 col-xxl-10">
                <div class="row justify-content-center">
                    <div class="col-xl-9">
                        <div class="my-5 step">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-md-4 col-form-label h3">Name : </label>
                                <div class="col-lg-9 col-xl-9 col-md-8 ">
                                    <label class="col-form-label h4">{{ $contact_us->name }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-md-4 col-form-label h3">Email : </label>
                                <div class="col-lg-9 col-xl-9 col-md-8 ">
                                    <label class="col-form-label h4">{{ $contact_us->email }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-md-4 col-form-label h3">Message : </label>
                                <div class="col-lg-9 col-xl-9 col-md-8 ">
                                    <label class="col-form-label h4">{{ $contact_us->message }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>



    </x-cards.basic-card>
</x-master>
