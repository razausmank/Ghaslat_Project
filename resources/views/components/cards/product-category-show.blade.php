<div class="card card-custom gutter-b">
    <div class="card-body">
        <div class="d-flex">
            <!--begin: Pic-->
            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                <div class="symbol symbol-50 symbol-lg-120">
                    <img alt="Pic" src="{{ $item->image ? asset(Storage::url($item->image)) : asset('assets/media/users/blank.png') }} ">
                </div>
                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                </div>
            </div>
            <!--end: Pic-->
            <!--begin: Info-->
            <div class="flex-grow-1">
                <!--begin: Title-->
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="mr-3">
                        <!--begin::Name-->
                        <a href="{{ route('productcategory.show', $item->id) }}" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $item->name }}</a>
                        <!--end::Name-->
                    </div>
                </div>
                <!--end: Title-->
                <!--begin: Content-->
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">{{ $item->description }}</div>
                    <div class="d-flex flex-wrap align-items-center py-2">
                        <div class="d-flex align-items-center mr-10">
                            <div class="mr-6">
                                <div class="font-weight-bold mb-2">Created</div>
                                <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="">
                                <div class="font-weight-bold mb-2">Updated</div>
                                <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{ $item->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: Content-->
            </div>
            <!--end: Info-->
        </div>
        <div class="separator separator-solid my-7"></div>
        <!--begin: Items-->
        <div class="d-flex align-items-center flex-wrap">
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Earnings</span>
                    <span class="font-weight-bolder font-size-h5">
                    <span class="text-dark-50 font-weight-bold">$</span>249,500</span>
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">No of Products</span>
                    <span class="font-weight-bolder font-size-h5">{{ $item->products->where('is_package', 0)->count() }}</span>
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">No of Packages </span>
                    <span class="font-weight-bolder font-size-h5">{{ $item->products->where('is_package', 1)->count() }}</span>
                </div>
            </div>
            <!--end: Item-->


        </div>
        <!--begin: Items-->
    </div>
</div>
