<x-master>
    <x-flash />
    <div class=" card card-custom gutter-b d-flex">
        <div class="d-flex justify-content-end ">
            <div class="   d-flex">
                <div class="card-body p-4 d-flex justify-content-end">
                    <div class="d-flex align-items-center">
                        <label class="mb-0 mx-3">Month</label>
                        <select id="menu_month_dropdown" class="form-control" name="menu_month">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center">
                        <label class="mb-0 mx-3">Year</label>
                        <select id="menu_year_dropdown" class="form-control" name="menu_year">
                            <option value="2021" selected="">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-around mx-5">

            <div class="card card-custom gutter-b bg-primary d-flex">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-4">
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Group..svg-->
                                <img src="{{ asset('assets/media/svg/icons/Communication/Clipboard-list.svg') }}" width="34px"
                                    height="34px">

                            </span>
                        </div>
                        <div>
                            <div class="text-dark font-weight-bolder font-size-h2 mt-3" id="new_customers_count">8,600</div>
                            <a href="#" class="text-white text-hover-primary font-weight-bold font-size-lg mt-1">New
                                Customers</a>
                        </div>
                    </div>

                    <hr />
                    <div class="text-dark font-weight-bolder  " id="verified_customers_count">10 walk in</div>
                    <div class="text-dark font-weight-bolder  " id="non_verified_customers_count">40 mobile app</div>
                </div>

            </div>
            <div class="card card-custom  bg-warning gutter-b d-flex">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-4">
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Group..svg-->
                                <img src="{{ asset('assets/media/svg/icons/Communication/Group.svg') }}" width="34px"
                                    height="34px">

                            </span>
                        </div>
                        <div>
                            <div class="text-dark font-weight-bolder font-size-h2 mt-3" id="total_orders_count">8,600</div>
                            <a href="#" class="text-white text-hover-primary font-weight-bold font-size-lg mt-1">Total
                                Orders</a>
                        </div>
                    </div>

                    <hr />
                    <div class="text-dark font-weight-bolder  " id="total_orders_count_walk_in">10 walk in</div>
                    <div class="text-dark font-weight-bolder  " id="total_orders_count_mobile">40 mobile app</div>
                </div>

            </div>
            <div class="card card-custom gutter-b bg-success d-flex">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-4">
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Group..svg-->
                                <img src="{{ asset('assets/media/svg/icons/Shopping/Dollar.svg') }}" width="34px"
                                    height="34px">

                            </span>
                        </div>
                        <div>
                            <div class="text-dark font-weight-bolder font-size-h2 mt-3" id="total_orders_revenue">8,600</div>
                            <a href="#" class="text-white text-hover-primary font-weight-bold font-size-lg mt-1">Total
                                Revenue</a>
                        </div>
                    </div>

                    <hr />
                    <div class="text-dark font-weight-bolder  " id="total_orders_revenue_walk_in">10 walk in</div>
                    <div class="text-dark font-weight-bolder  " id="total_orders_revenue_mobile">40 mobile app</div>
                </div>

            </div>
            <div class="card card-custom gutter-b bg-danger d-flex">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-4">
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Group..svg-->
                                <img src="{{ asset('assets/media/svg/icons/Electric/Washer.svg') }}" width="34px"
                                    height="34px">

                            </span>
                        </div>
                        <div>
                            <div class="text-dark font-weight-bolder font-size-h2 mt-3" id="completed_orders">8,600</div>
                            <a href="#" class="text-white text-hover-primary font-weight-bold font-size-lg mt-1">Completed Orders</a>
                        </div>
                    </div>


                    <hr />
                    <div class="text-dark font-weight-bolder  " id="orders_in_progress">10 walk in</div>
                    <div class="text-dark font-weight-bolder  " id="orders_new_order">40 mobile app</div>
                </div>

            </div>


        </div>
        <div class="row m-0">
            <div class="col-6 p-0 pr-8">
                <div class="  card-custom  gutter-b d-flex">
                    <div class="card-body">

                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">Top 10 Customers</div>
                        <table id="customers_table" class="display  table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Order</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 p-0 pl-8">
                <div class=" card-custom gutter-b d-flex">
                    <div class="card-body">
                        <div class="text-dark font-weight-bolder font-size-h2 mt-3">Pending Orders</div>
                        <table id="order_table" class="display  table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Number </th>
                                    <th>Status</th>
                                    <th>Order Mode</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                $("#menu_month_dropdown").val(new Date().getMonth() + 1);
                $("#menu_year_dropdown").val(new Date().getFullYear());
                getData();
                order_table = $('#order_table').DataTable({
                    "dom": 'rt',
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.get_orders') }}",
                        "data": getMonthYear,
                    },
                    "columns": [{
                            "data": "order_number"
                        },
                        {
                            "data": "status"
                        },
                        {
                            "data": "order_mode"
                        }
                    ]
                });

                customer_table = $('#customers_table').DataTable({
                    "dom": 'rt',
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.get_customers') }}",
                        "data": getMonthYear,
                    },
                    "columns": [{
                            "data": "name"
                        },
                        {
                            "data": "total_orders"
                        },
                        {
                            "data": "total_sum"
                        }
                    ]
                });
                $('#menu_month_dropdown, #menu_year_dropdown').change(function() {

                    orders_table();
                    customers_table();
                    getData();
                });


            });

            function getMonthYear() {
                month = $("#menu_month_dropdown").val();
                year = $("#menu_year_dropdown").val();

                return {
                    "month": month,
                    "year": year
                };
            }

            function orders_table() {
                order_table.ajax.reload();
            }

            function customers_table() {
                customer_table.ajax.reload();
            }

            function getData() {
                $.ajax({
                    url: '/admin/dashboard/getData',
                    type: "GET",
                    "data": getMonthYear(),
                    success: function(data) {
                        console.log(data);
                        $('#new_customers_count').text(data.new_customers_count);
                        $('#verified_customers_count').text(`${data.verified_customers} verified`);
                        $('#non_verified_customers_count').text(`${data.non_verified_customers} non-verified`);
                        $('#total_orders_count').text(data.total_orders_count);
                        $('#total_orders_count_walk_in').text(`${data.total_orders_count_walk_in} walk in`);
                        $('#total_orders_count_mobile').text(`${data.total_orders_count_mobile} mobile`);
                        $('#total_orders_revenue').text(data.total_orders_revenue);
                        $('#total_orders_revenue_walk_in').text(`${data.total_orders_revenue_walk_in} walk in`);
                        $('#total_orders_revenue_mobile').text(`${data.total_orders_revenue_mobile} mobile`);
                        $('#completed_orders').text(`${data.total_orders_delivered_orders}`);
                        $('#orders_in_progress').text(`${data.total_orders_in_progress_orders} In Progress`);
                        $('#orders_new_order').text(`${data.total_orders_pending_orders} New Orders`);

                    },
                    complete: function() {
                        $('.spinner_over_screen').hide();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        $('.spinner_over_screen').hide();
                    }
                });
            }
        </script>
    </x-slot>



</x-master>
