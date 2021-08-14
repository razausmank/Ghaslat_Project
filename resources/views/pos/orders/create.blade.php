<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('pos/css/styles.css') }}">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <link rel="stylesheet" href="{{ asset('pos/css/custom.css') }}" type="text/css">


</head>

<body style="height: 100%">
    <div class="row  m-0 p-0">
        <div class="col-12  m-0 p-0 top_header">
            <div class="row  m-0 p-0">

                <div class="col-8  d-flex m-0 p-0">
                    <div class="my-auto mx-4"><i aria-hidden="true" class="
                        fas fa-align-justify" style="color: #fff; font-size:30px"></i></div>
                    <ul class="nav nav-tabs ml-5" id="myTab" role="tablist"
                        style="    border-bottom: 1px solid #0cc579">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Profile</button>
                        </li>

                    </ul>
                </div>
                <div class="col-4 d-flex justify-content-between m-0 p-0">
                    <div class="my-auto mx-4"><i aria-hidden="true" class="
                        fas fa-align-justify" style="color: #fff; font-size:30px"></i></div>
                    <h1 class="m-0 my-auto text-white">Cart (<span id="no_of_items_in_cart">0</span>)</h1>
                    <div class="my-auto mx-4"><i class=" fas fa-plus p-0" style="color: #fff;  font-size:30px"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-8  special  m-0 p-0 ">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row m-0 bg-white px-5 py-7">

                        @foreach ($products as $product)

                            <div class="col-3 my-3">
                                <a class=" d-flex flex-column justify-content-center item border border-dark py-3">
                                    <div class="symbol symbol-150 symbol-lg-150 m-auto">
                                        <img alt="product_image" class=""
                                            src="{{ $product->image ? asset(Storage::url($product->image)) : asset('assets/media/svg/icons/shopping/cart2.svg') }}">
                                    </div>

                                    <p class="clothes-titles m-0">{{ $product->name }}</p>
                                    <input type=" text" name="name" value="{{ $product->name }}" hidden>
                                    <input type="number" name="id" value="{{ $product->id }}" hidden>
                                    <input type="number" name="price" value="{{ $product->price }}" hidden>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row m-0 bg-white px-5 py-7">

                        @foreach ($orders as $order)

                            <div class="col-3 my-3">
                                <a href="{{ route('pos.order.show', $order) }}" data-target="#orderModal"
                                    data-toggle="modal"
                                    class=" d-flex flex-column justify-content-center order border border-dark py-3">
                                    <div class="symbol symbol-150 symbol-lg-150 m-auto">
                                        <img alt="order_image" class=""
                                            src="{{ asset('assets/media/svg/icons/shopping/cart2.svg') }}">
                                    </div>

                                    <p class="clothes-titles m-0">{{ $order->status }}</p>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="col-4    m-0 p-0 ">
            <form action="{{ route('pos.order.store') }}" method="post" id="order_form">
                @csrf
                @method('POST')
                <div class="form-group bg-white pl-4 py-4 pr-0 mb-2">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent symbol symbol-circle pr-3">
                            <img alt="product_image" class="" src="{{ asset('assets/media/users/blank.png') }}">
                        </div>
                        <select name="customer_id" id="select2" placeholder="Select a Customer"
                            class="form-control select2-hidden-accessible" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"> {{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append ">
                            <span class="input-group-text bg-transparent    ">
                                <label class="checkbox checkbox-inline checkbox-primary">
                                    <button type="button" class="btn btn-link btn-sm p-0"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                            </path>
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"></path>
                                        </svg></button>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bg-white ">
                    <h1 class="p-2 m-0 text-center">Ordered Items</h1>
                </div>
                <div id="cart" class="bg-white p-3">
                    {{-- <a class=" d-flex flex-column justify-content-center item">
                        <div class="d-flex my-2">
                            <div class="symbol align-self-center pr-3">
                                <img alt="product_image" class=""
                                    src="{{ isset($product->image) ? asset(Storage::url($product->image)) : asset('assets/media/users/blank.png') }}">
                            </div>
                            <div class="flex-fill align-self-center">
                                <h1 class="m-0">hello</h1>
                            </div>
                            <h4 class="align-self-center  m-0">Aed 400</h4>
                            <input type="text" name="name[]" value="1" hidden>
                            <input type="number" name="id[]" value="1" hidden>
                            <input type="number" name="price[]" value="1" hidden>
                            <input type="number" name="quantity[]" value="1" hidden>
                        </div>
                    </a> --}}
                </div>

                <div class="bill-info bg-white my-2 p-2">
                    <div class="d-flex justify-content-between flex-fill">
                        <span class="add-discount">Add Discount</span>
                        <button class="plus-button right-align" type="button"><svg xmlns="http://www.w3.org/2000/svg"
                                width="30" height="30" fill="currentColor" class="bi bi-plus-circle"
                                viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg></button>
                    </div>
                    <hr class="m-1">
                    <div class="d-flex justify-content-between my-2">
                        <span class="bill-info-text">Subtotal</span>
                        <span class="bill-info-text subtotal">AED 0.00</span>
                    </div>
                    <hr class="m-2">

                    <div class="d-flex justify-content-between  my-2">
                        <span class="bill-info-text">VAT(5%)</span>
                        <span class="bill-info-text vat_in_money">AED 0.00</span>
                        <input type="number" name="vat" value="5" hidden>
                    </div>



                </div>
                <div class="payment_method_div">

                    <select name="payment_option" class="payment_method_select p-3 m-3" required>
                        <option value="Pay Later">Pay Later</option>
                        <option value="Pay By Cash">Pay By Cash</option>
                        <option value="Pay By Card">Pay By Card</option>
                    </select>
                </div>
                <button type="submit"
                    class="submit_button btn btn-primary btn-lg btn-block d-flex justify-content-between">
                    <span>Total </span>
                    <span class="total_in_money">AED 0.00</span>
                </button>

            </form>
        </div>


    </div>



    <!-- Modal-->
    <div class="modal " id="product_adjustment" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="fas fa-times" style="color: #000; font-size:30px"></i>
                    </button>
                    <h5 class="modal-title" id="modal_product_title">Modal Title</h5>
                    <button type="button" id="add_product_info" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-plus p-0" style="color: #000;  font-size:30px"></i>
                    </button>
                </div>
                <div class="modal-body py-0">
                    <div data-scroll="true" data-height="300">

                        <div class="d-flex justify-content-center mx-5 my-10">
                            <button type="button" id="modal_product_quantity_decrease_button"
                                class="btn btn-lg submit_button px-12 mx-5"><i class="fas fa-minus p-0"
                                    style="color: #fff"></i></button>

                            <input type="number" min="0" name="modal_product_quantity"
                                class="modal_product_quantity form-control h1 text-center  m-0  mx-5">

                            <button type="button" id="modal_product_quantity_increase_button"
                                class="btn btn-lg submit_button px-12 mx-5"><i class="fas fa-plus p-0"
                                    style="color: #fff"></i></button>
                        </div>
                        <input type="number" name="modal_product_id" hidden>
                        <div class="modal-footer d-flex justify-content-center ">
                            <h1 class="modal_product_value">AED 20.00</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Calculator Modal-->
    <div class="modal" id="calculatormodal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="fas fa-times" style="color: #000; font-size:30px"></i>
                    </button>
                    <h5 class="modal-title">Add Discount</h5>
                    <button type="button" id="add_discount_info" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-plus p-0" style="color: #000;  font-size:30px"></i>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="d-flex justify-content-center px-3 pt-3">
                        <input data-switch="true" type="checkbox" checked="checked" data-on-text="%"
                            data-handle-width="50" data-off-text="AED" data-on-color="success"
                            data-off-color="primary" />
                    </div>
                    <hr />
                    <div class="m-4">
                        <input type="text" name="discount_value" step="any" placeholder="0.00"
                            class="form-control form-control-solid text-right h1 " readonly>
                    </div>


                    <div class="row percent_row m-0">
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="5">
                                5%
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="10">
                                10%
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="20">
                                20%
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="30">
                                30%
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="50">
                                50%
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="clear_button">
                                Clear
                            </button>
                        </div>

                    </div>
                    <div class="row value_row d-none m-0">
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="5">
                                5
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="10">
                                10
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="20">
                                20
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="30">
                                30
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="percentage_buttons" value="50">
                                50
                            </button>
                        </div>
                        <div class="col-2 p-0">
                            <button type="button" class="clear_button">
                                Clear
                            </button>
                        </div>

                    </div>
                    <div class="row m-0">
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="1">
                                1
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="2">
                                2
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="3">
                                3
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="4">
                                4
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="5">
                                5
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="6">
                                6
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="7">
                                7
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="8">
                                8
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="9">
                                9
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value=".">
                                .
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="number_buttons" value="0">
                                0
                            </button>
                        </div>
                        <div class="col-4 p-0">
                            <button type="button" class="enter_button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                Enter
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Order Modal --}}
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModal" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="spinner_over_screen" style="display: none "></div>
                    <div class="card-body p-0">
                        <div class="row justify-content-center px-8  px-md-0">
                            <div class="col-md-10">
                                <div class="d-flex justify-content-between pt-6">
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">ORDER DATE</span>
                                        <span class="opacity-70" id="modal_order_date">Jan 07, 2020</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">ORDER STATUS</span>
                                        <span class="opacity-70" id="modal_order_status">64616-103</span>
                                    </div>
                                    <div class="d-flex flex-column flex-root">
                                        <span class="font-weight-bolder mb-2">Customer Name</span>
                                        <span class="opacity-70" id="modal_customer_name">Iris Watson</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="pl-0 font-weight-bold text-muted text-uppercase">Ordered
                                                    Items</th>
                                                <th class="text-right font-weight-bold text-muted text-uppercase">Qty
                                                </th>
                                                <th class="text-right font-weight-bold text-muted text-uppercase">Unit
                                                    Price</th>
                                                <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">
                                                    Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modal_items_list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center bg-gray-100  px-8  px-md-0 mx-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold text-muted text-uppercase">PAYMENT TYPE</th>
                                                <th class="font-weight-bold text-muted text-uppercase">DISCOUNT
                                                </th>
                                                <th class="font-weight-bold text-muted text-uppercase">VAT</th>
                                                <th class="font-weight-bold text-muted text-uppercase text-right">TOTAL
                                                    AMOUNT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bolder">
                                                <td id='modal_payment_type'>Credit Card</td>
                                                <td id='modal_discount_amount'>Success</td>
                                                <td id='modal_vat_amount'>Jan 07, 2020</td>
                                                <td id='modal_total_amount'
                                                    class="text-primary font-size-h3 font-weight-boldest text-right">
                                                    $789.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- print modal --}}

    <div class="modal fade " id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body" id="printable_div">
                    <div class="d-flex justify-content-between flex-root mb-2">
                        <span class="font-weight-bolder ">ORDER DATE</span>
                        <span id="print_modal_order_date">Jan 07, 2020</span>
                    </div>
                    <div class="d-flex justify-content-between  flex-root">
                        <span class="font-weight-bolder ">Customer Name</span>
                        <span id="print_modal_customer_name">Iris Watson</span>
                    </div>
                    <hr />
                    <div id="print_modal_item_list">


                    </div>

                    <hr />
                    <div>
                        <div class="d-flex flex-root justify-content-between">
                            <span class="">SubTotal</span>
                            <span id="print_modal_subtotal">Jan 07, 2020</span>
                        </div>
                        <div class="d-flex flex-root justify-content-between">
                            <span class=" ">VAT</span>
                            <span id="print_modal_vat">Jan 07, 2020</span>
                        </div>
                        <div class="d-flex flex-root justify-content-between" id="print_modal_discount">

                        </div>
                    </div>

                    <hr />
                    <div>
                        <div class="d-flex flex-root justify-content-between">
                            <span class="font-weight-bolder h4">Total</span>
                            <span class=" font-weight-bolder h4" id="print_modal_total">Jan 07, 2020</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Close</button>
                    <button type="button" id="test" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var asset_url = '{{ asset('') }}';
        let session_message, session_message_type = null;
        let validation_errors = [];

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                validation_errors.push('{{ $error }}' ) ;
            @endforeach
        @endif
        @if (Session::has('success'))
            session_message = '{{ Session::get('success') }}' ;
            session_message_type = 'success' ;
        @endif

        @if (Session::has('failure'))
            session_message = '{{ Session::get('failure') }}' ;
            session_message_type = 'failure' ;
        @endif
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    <script src="{{ asset('pos/js/create_order.js') }}"></script>
    <script src="{{ asset('pos/js/select2.js') }}"></script>
    <script src="{{ asset('pos/js/calculator.js') }}"></script>
    <script src="{{ asset('pos/js/switch.js') }}"></script>
    <script src="{{ asset('pos/js/print_order.js') }}"></script>
    <script src="{{ asset('pos/js/order.js') }}"></script>

    {{-- printing --}}

    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.css"></script>


</body>

</html>
