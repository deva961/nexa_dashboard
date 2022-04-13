@extends('layouts.app')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card bg-primary bg-soft">
                            <div>
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>{{ Auth::user()->name }}</p>

                                            <ul class="ps-3 mb-0">
                                                <li class="py-1">Saboo Nexa</li>
                                                <li class="py-1">Saboo Arena</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="public/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="bx bx-copy-alt"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">Pop up</h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            @if (intval($popup_percentage) === 0)
                                                <h4>{{ $popup }}</h4>
                                                <div class="d-flex">
                                                    <span class="badge badge-soft-warning font-size-12">
                                                        {{ intval($popup_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                            @if (intval($popup_percentage) > 0)
                                                <h4>{{ $popup }} <i class="mdi mdi-chevron-up ms-1 text-success"></i>
                                                </h4>
                                                <div class="d-flex">
                                                    <span class="badge badge-soft-success font-size-12">+
                                                        {{ intval($popup_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                            @if (intval($popup_percentage) < 0)
                                                <h4>{{ $popup }} <i
                                                        class="mdi mdi-chevron-down ms-1 text-danger"></i></h4>
                                                <div class="d-flex">
                                                    <span
                                                        class="badge badge-soft-danger font-size-12">{{ intval($popup_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="bx bx-archive-in"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">On Road Price</h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            @if (intval($onRoadPrice_percentage) === 0)
                                                <h4>{{ $onRoadPrice }}</h4>
                                                <div class="d-flex">
                                                    <span class="badge badge-soft-warning font-size-12">
                                                        {{ intval($onRoadPrice_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                            @if (intval($onRoadPrice_percentage) > 0)
                                                <h4>{{ $onRoadPrice }} <i
                                                        class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                                <div class="d-flex">
                                                    <span class="badge badge-soft-success font-size-12">+
                                                        {{ intval($onRoadPrice_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                            @if (intval($onRoadPrice_percentage) < 0)
                                                <h4>{{ $onRoadPrice }} <i
                                                        class="mdi mdi-chevron-down ms-1 text-danger"></i></h4>
                                                <div class="d-flex">
                                                    <span
                                                        class="badge badge-soft-danger font-size-12">{{ intval($onRoadPrice_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs me-3">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="bx bx-purchase-tag-alt"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0">Car Enquiry</h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            @if (intval($enquiry_percentage) === 0)
                                            <h4>{{ $enquiry }}</h4>
                                                <div class="d-flex">
                                                    <span class="badge badge-soft-warning font-size-12">
                                                        {{ intval($enquiry_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                            @if (intval($enquiry_percentage) > 0)
                                            <h4>{{ $enquiry }} <i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                                <div class="d-flex">
                                                    <span class="badge badge-soft-success font-size-12">+
                                                        {{ intval($enquiry_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif

                                            @if (intval($enquiry_percentage) < 0)
                                            <h4>{{ $enquiry }} <i class="mdi mdi-chevron-down ms-1 text-danger"></i></h4>
                                                <div class="d-flex">
                                                    <span
                                                        class="badge badge-soft-danger font-size-12">{{ intval($enquiry_percentage) }}%</span>
                                                    <span class="ms-2 text-truncate">From previous month</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">

                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Book A Service</p>
                                        <h5 class="mb-0">{{ $bookService }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-book-bookmark"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card blog-stats-wid">
                            <div class="card-body">

                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Finance</p>
                                        <h5 class="mb-0">{{ $finance }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-note"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card blog-stats-wid">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Insurance</p>
                                        <h5 class="mb-0">{{ $insurance }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-message-square-dots"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card blog-stats-wid">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    <div class="me-3">
                                        <p class="text-muted mb-2">Contact Us</p>
                                        <h5 class="mb-0">{{ $contactUs }}</h5>
                                    </div>

                                    <div class="avatar-sm ms-auto">
                                        <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-phone-call"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-end">
                                        <div class="input-group input-group-sm">
                                            <select class="form-select form-select-sm">
                                                <option value="" selected>{{ Carbon\Carbon::now()->format('F') }}
                                                </option>
                                            </select>
                                            <label class="input-group-text">Month</label>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4">POP UP</h4>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="text-muted">
                                            <div class="mb-4">
                                                <p>This month</p>
                                                <h4>{{ $popup_month }}</h4>
                                                @if (intval($popup_percentage) > 0)
                                                    <div class="d-flex">
                                                        <span class="badge badge-soft-success font-size-12">+
                                                            {{ intval($popup_percentage) }}%</span>
                                                        <span class="ms-2 text-truncate">From previous month</span>
                                                    </div>
                                                @endif

                                                @if (intval($popup_percentage) < 0)
                                                    <div class="d-flex">
                                                        <span class="badge badge-soft-danger font-size-12">
                                                            {{ intval($popup_percentage) }}%</span>
                                                        <span class="ms-2 text-truncate">From previous month</span>
                                                    </div>
                                                @endif

                                                @if (intval($popup_percentage) === 0)
                                                    <div class="d-flex">
                                                        <span class="badge badge-soft-warning font-size-12">
                                                            {{ intval($popup_percentage) }}%</span>
                                                        <span class="ms-2 text-truncate">From previous month</span>
                                                    </div>
                                                @endif
                                            </div>

                                            <div>
                                                <a href="{{ route('popup.index') }}"
                                                    class="btn btn-primary waves-effect waves-light btn-sm">View
                                                    Details <i class="mdi mdi-chevron-right ms-1"></i></a>
                                            </div>

                                            <div class="mt-4">
                                                <p class="mb-2">Last month</p>
                                                <h5>{{ $popup_last_month_data }}</h5>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                        <div id="line-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Saboo Motor</h4>

                                <div>
                                    <div id="donut-chart" class="apex-charts"></div>
                                </div>

                                <div class="text-center text-muted">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i
                                                        class="mdi mdi-circle text-primary me-1"></i> Nexa</p>
                                                <h5>{{ $nexa_donut_chart_data }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i
                                                        class="mdi mdi-circle text-success me-1"></i> Arena</p>
                                                @if ($arena_donut_chart_data > 0)
                                                    <h5>{{ $arena_donut_chart_data }}</h5>
                                                @endif
                                                @if ($arena_donut_chart_data == 0)
                                                    <h5>coming soon</h5>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i
                                                        class="mdi mdi-circle text-danger me-1"></i> Commercial</p>
                                                @if ($commercial_donut_chart_data > 0)
                                                    <h5>{{ $commercial_donut_chart_data }}</h5>
                                                @endif
                                                @if ($commercial_donut_chart_data == 0)
                                                    <h5>coming soon</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-xl-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-start">
                                    <h5 class="card-title me-2">Leads</h5>
                                    <div class="ms-auto">
                                        <div class="toolbar d-flex flex-wrap gap-2 text-end">
                                            <button type="button" class="btn btn-light btn-sm">
                                                ALL
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm">
                                                1M
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm">
                                                6M
                                            </button>
                                            <button type="button" class="btn btn-light btn-sm active">
                                                1Y
                                            </button>

                                        </div>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-lg-4">
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">Today</p>
                                            <h5>1024</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">This Month</p>
                                            <h5>12356 <span class="text-success font-size-13">0.2 % <i
                                                        class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mt-4">
                                            <p class="text-muted mb-1">This Year</p>
                                            <h5>102354 <span class="text-success font-size-13">0.1 % <i
                                                        class="mdi mdi-arrow-up ms-1"></i></span></h5>
                                        </div>
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <div class="apex-charts" id="area-chart" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © BroaddCast.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Powered by BroaddCast
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection


@section('script')
    <script>
        //popup graph
        var pop_up_data = <?php echo $pop_up_graph; ?>;
        var options = {
                series: [{
                    name: "PopUp",
                    data: pop_up_data,
                }, ],
                chart: {
                    height: 320,
                    type: "line",
                    toolbar: "false",
                    dropShadow: {
                        enabled: !0,
                        color: "#000",
                        top: 18,
                        left: 7,
                        blur: 8,
                        opacity: 0.2,
                    },
                },
                dataLabels: {
                    enabled: !1
                },
                colors: ["#556ee6"],
                stroke: {
                    curve: "smooth",
                    width: 3
                },
            },
            chart = new ApexCharts(document.querySelector("#line-chart"), options);
        chart.render();


        //donut chart
        options = {
            series: <?php echo $donut_chart; ?>,
            chart: {
                type: "donut",
                height: 262
            },
            labels: ["Nexa", "Arena", "Commercial"],
            colors: ["#556ee6", "#34c38f", "#f46a6a"],
            legend: {
                show: !1
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "70%"
                    }
                }
            },
        };
        (chart = new ApexCharts(
            document.querySelector("#donut-chart"),
            options
        )).render();


        //leads graph
        var options = {
                series: [{
                        name: "Current",
                        data: [18, 21, 45, 36, 65, 47, 51, 32, 40, 28, 31, 26],
                    },
                    {
                        name: "Previous",
                        data: [30, 11, 22, 18, 32, 23, 58, 45, 30, 36, 15, 34],
                    },
                ],
                chart: {
                    height: 350,
                    type: "area",
                    toolbar: {
                        show: !1
                    }
                },
                colors: ["#556ee6", "#f1b44c"],
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "smooth",
                    width: 2
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: !1,
                        opacityFrom: 0.45,
                        opacityTo: 0.05,
                        stops: [20, 100, 100, 100],
                    },
                },
                xaxis: {
                    categories: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                },
                markers: {
                    size: 3,
                    strokeWidth: 3,
                    hover: {
                        size: 4,
                        sizeOffset: 2
                    }
                },
                legend: {
                    position: "top",
                    horizontalAlign: "right"
                },
            },
            chart = new ApexCharts(document.querySelector("#area-chart"), options);
        chart.render();
    </script>
@endsection
