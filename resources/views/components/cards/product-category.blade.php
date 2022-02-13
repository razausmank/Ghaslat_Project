<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
    <!--begin::Card-->
    <div class="card card-custom gutter-b card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
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
                        <a href="{{ route('productcategory.show', $item->id) }}" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{ $item->name }}</a>
                        {{-- <span class="text-muted font-weight-bold">Head of Development</span> --}}
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
                    <span class="text-dark-75 font-weight-bolder mr-2">Number of Products:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $item->products->where('is_package', 0)->count() }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-cente my-1">
                    <span class="text-dark-75 font-weight-bolder mr-2">Number of Packages:</span>
                    <a href="#" class="text-muted text-hover-primary">{{ $item->products->where('is_package', 1)->count() }}</a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark-75 font-weight-bolder mr-2">Active Products:</span>
                    <span class="text-muted font-weight-bold">{{ $item->products->where('is_package', 0)->where('is_active' , 1)->count() }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-dark-75 font-weight-bolder mr-2">Active Packages:</span>
                    <span class="text-muted font-weight-bold">{{ $item->products->where('is_package', 1)->where('is_active' , 1)->count() }}</span>
                </div>
            </div>
            <!--end::Info-->
            <div class="row d-flex justify-content-end">
                <a href="{{ route('productcategory.edit', $item->id) }}" class="btn  btn-sm btn-light-primary font-weight-bolder text-uppercase mr-4">  <i class="la la-edit"></i> Edit</a>
                <form class="product_categories_delete_form" action="{{ route('productcategory.destroy', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn  btn-sm btn-light-danger font-weight-bolder text-uppercase " title="Delete">
                        <i class="la la-trash"></i> Delete
                    </button>
                </form>

            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
