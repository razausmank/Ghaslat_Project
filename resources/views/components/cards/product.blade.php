<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <div class="d-flex justify-content-end">
                <span class="label label-lg font-weight-bold  label-light-{{ $item->is_package ? 'primary' : 'danger' }} label-inline">{{ $item->is_package ? 'Package' : 'Product' }}</span>
            </div>
            <!--begin::User-->
            <div class="d-flex align-items-end mb-7">
                <!--begin::Pic-->
                <div class="d-flex align-items-center">
                    <!--begin::Pic-->
                    <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                        <div class="symbol symbol-circle symbol-lg-75">
                            <img src="{{ $item->image ? asset(Storage::url($item->image)) : asset('assets/media/users/blank.png') }} " alt="image">
                        </div>
                        <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                            <span class="font-size-h3 font-weight-boldest">JM</span>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <a href="{{ route('product.show', $item->id) }}" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $item->name }}</a>
                        <span class="text-muted font-weight-bold">{{ $item->product_category->name }}</span>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::User-->
            <!--begin::Desc-->
            <p class="mb-7">{{ $item->description }}</p>
            <!--end::Desc-->
            <!--begin::Info-->
            <div class="mb-7">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark-75 font-weight-bolder mr-2">Price:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $item->price }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-1">
                    <span class="text-dark-75 font-weight-bolder mr-2">Active:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $item->is_active ? 'Yes' : 'No'}}</a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark-75 font-weight-bolder mr-2">Orders:</span>
                    <span class="text-muted font-weight-bold">{{ $item->orders->count() }}</span>
                </div>
            </div>
            <!--end::Info-->
            <div class="row d-flex justify-content-end">
                <a href="#" class="btn  btn-sm btn-light-primary font-weight-bolder text-uppercase mr-4">  <i class="la la-edit"></i> Edit</a>
                <a href="#" class="btn  btn-sm btn-light-danger font-weight-bolder text-uppercase ">  <i class="la la-trash"></i>Delete</a>
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>

