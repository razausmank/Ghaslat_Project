<x-master title="Orders" :breadcrumbs="[ 'Orders' => 'order.index'  ]">

    <x-flash />
    <div class="card card-custom mb-5">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">
                    All Orders
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between flex-fill">
                            <div class="mx-3">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">Please Select an Option</option>
                                        <option value="New Order">New Order</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Waiting For Pickup">Waiting For Pickup</option>
                                        <option value="Waiting For Delivery">Waiting For Delivery</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Delivered">Delivered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mx-3">
                                <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="card-body">

            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>No. of Items</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order)
                        <tr>

                            <td ><a href="{{ route('pos.order.show', $order) }}" data-target="#orderModal"
                                data-toggle="modal" class="order">{{ $order->order_number }} </a></td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->status }}</td>

                            <td>{{ $order->products }}</td>

                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td>{{ $order->updated_at->diffForHumans() }}</td>



                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>

        <!-- Order Modal -->
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
                        <div class="spinner_over_screen_1" style="display: none "></div>
                        <div class="card-body row order_modal_body_content p-0">
                            <div class="col-md-6" style="border-right: 2px black solid">
                                <div class="row justify-content-center px-8  px-md-0">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between pt-6">
                                            <div class="d-flex flex-column ">
                                                <span class="font-weight-bolder mb-2">ORDER DATE</span>
                                                <span class="opacity-70 pr-5" id="modal_order_date">Jan 07, 2020</span>
                                            </div>
                                            <div class="d-flex flex-column ">
                                                <span class="font-weight-bolder mb-2">ORDER Number</span>
                                                <span class="opacity-70 pr-40" id="modal_order_number">1200XHEQ</span>

                                            </div>
                                            <div class="d-flex flex-column ">
                                                <span class="font-weight-bolder mb-2">Customer Name</span>
                                                <span class="opacity-70 pl-5" id="modal_customer_name">Iris
                                                    Watson</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center px-8  px-md-0">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between pt-6">
                                            <div class="d-flex flex-column ">
                                                <span class="font-weight-bolder mb-2">Payment Type</span>
                                                <select class="form-control py-0" name='payment_type'
                                                    id="modal_payment_type" disabled>
                                                    <option value="Pay Later">Pay Later</option>
                                                    <option value="Pay By Cash">Pay By Cash</option>
                                                    <option value="Pay By Card">Pay By Card</option>
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column ">
                                                <span class="font-weight-bolder mb-2">ORDER STATUS</span>
                                                <select class="form-control py-0" name="status" id="modal_order_status" disabled>
                                                    <option value="New Order">New Order</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Waiting For Pickup">Waiting For Pickup</option>
                                                    <option value="Waiting For Delivery">Waiting For Delivery</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                </select>
                                            </div>
                                            <div class="d-flex flex-column ">
                                                <span class="font-weight-bolder mb-2">Payment Received</span>
                                                <select class="form-control py-0" name="payment_received"
                                                    id="modal_payment_received" disabled>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <input type="text" hidden name="modal_order_id" id="modal_order_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">
                                                            Ordered
                                                            Items</th>
                                                        <th
                                                            class="text-right font-weight-bold text-muted text-uppercase">
                                                            Qty
                                                        </th>
                                                        <th
                                                            class="text-right font-weight-bold text-muted text-uppercase">
                                                            Unit
                                                            Price</th>
                                                        <th
                                                            class="text-right pr-0 font-weight-bold text-muted text-uppercase">
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
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="font-weight-bold text-muted text-uppercase">SUBTOTAL
                                                        </th>
                                                        <th class="font-weight-bold text-muted text-uppercase">DISCOUNT
                                                        </th>
                                                        <th class="font-weight-bold text-muted text-uppercase">VAT</th>
                                                        <th
                                                            class="font-weight-bold text-muted text-uppercase text-right">
                                                            TOTAL
                                                            AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="font-weight-bolder">
                                                        <td id='modal_sub_total'>AED 0.00</td>
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
                            <div class="col-md-6">
                                <div class="row justify-content-center px-8 px-md-0 text-dark">
                                    <div class="col-md-12">
                                        <div>
                                            <h3 class="p-2 m-0 ">Order History</h1>
                                        </div>
                                        <hr class=" border-2 border-dark" />
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Payment Option</th>
                                                    <th>
                                                        Payment Received
                                                    </th>
                                                    <th>
                                                        Updated By
                                                    </th>
                                                    <th>Updated At</th>

                                                </tr>
                                            </thead>
                                            <tbody id="order_modal_order_history">

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
        <x-slot name="scripts">
            <script>
                $('body').on('click', '.order', function(e) {
                            var asset_url = '{{ asset('') }}';
                            $('.spinner_over_screen_1').show();
                            e.preventDefault();
                            $('.order_modal_body_content').hide();
                            $.ajax({
                                        url: $(this).attr('href'),
                                        type: "GET",
                                        success: function(data) {
                                            $('#modal_order_date').text(moment(data.created_at).format('DD MMMM YYYY'));
                                            $('#modal_order_status').val(data.status);
                                            $('#modal_customer_name').text(data.customer.name);
                                            $('#modal_payment_type').val(data.payment_option);
                                            $('#modal_payment_received').val(data.payment_received == "1" ? 1 : 0);
                                            $('#modal_order_number').text(data.order_number ?? '--------');

                                            $('#modal_items_list').empty();
                                            subtotal = 0;
                                            for (i = 0; i < data.products.length; i++) {
                                                subtotal += Number(data.products[i].pivot.quantity * data.products[i].pivot
                                                    .price, 2);
                                                $('#modal_items_list').append(`
                <tr class="font-weight-boldest">
                    <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                        <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                            <div class="symbol-label"
                                style="background-image: url('${data.products[i].image ? asset_url + data.products[i].image.replace("public", "storage") : asset_url + 'assets/media/svg/icons/Clothes/Hanger.svg'}')">
                            </div>
                        </div>
                        ${data.products[i].name}
                    </td>
                    <td class=" border-0 text-right pt-7 align-middle">${Number(data.products[i].pivot.quantity, 2)}</td>
                    <td class=" border-0 text-right pt-7 align-middle">AED ${Number(data.products[i].pivot.price, 2).toFixed(2)}</td>
                    <td class=" border-0 text-primary pr-0 pt-7 text-right align-middle">AED ${Number(data.products[i].pivot.quantity * data.products[i].pivot.price, 2).toFixed(2)}</td>
                </tr>
                `);
                                            }
                                            $('#order_modal_order_history').empty();
                                            for (i = 0; i < data.order_logs.length; i++) {
                                                $('#order_modal_order_history').append(`
                <tr >
                    <td >${data.order_logs[i].status}</td>
                    <td >${data.order_logs[i].payment_option}</td>
                    <td >${data.order_logs[i].payment_received ? 'No' : 'Yes'}</td>
                    <td > ${data.order_logs[i].updated_by.name}</td>
                    <td > ${moment(data.order_logs[i].updated_at).format('DD MMMM YYYY')}</td>
                </tr>
                `);
                                            }

                                            $('#modal_sub_total').text('AED ' + Number(data.sub_total, 2).toFixed(2));

                                            $('#modal_discount_amount').text('AED ' + Number(data.discount_in_money, 2).toFixed(
                                                2));

                                            $('#modal_vat_amount').text('AED ' + Number(data.vat_in_money, 2).toFixed(2));

                                            $('#modal_total_amount').text('AED ' + Number(data.total_price, 2).toFixed(2));
                                            $('#modal_order_id').val(data.id);
                                        },
                                        complete: function() {
                                            $('.spinner_over_screen_1').hide();
                                            $('.order_modal_body_content').show();
                                        },
                                        error: function(xhr) {
                                            console.log(xhr);
                                            $('.spinner_over_screen_1').hide();
                                            $('.order_modal_body_content').show();
                                        }
                                    });
                                });
            </script>
            <script src="{{ asset('main/js/html-table.js') }}"></script>
        </x-slot>
</x-master>
