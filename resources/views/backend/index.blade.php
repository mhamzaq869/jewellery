@extends('backend.layouts.app')

@section('content')

    <div class="content-body">
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row match-height">

                <!-- Statistics Card -->
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card card-statistics">

                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-primary me-2">
                                            <div class="avatar-content">
                                                <i data-feather="trending-up" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{$orders->where('status','!=','cancelled')->count()}}</h4>
                                            <p class="card-text font-small-3 mb-0">Sales</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-info me-2">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{$customers->count()}}</h4>
                                            <p class="card-text font-small-3 mb-0">Customers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-danger me-2">
                                            <div class="avatar-content">
                                                <i data-feather="box" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{$products->count()}}</h4>
                                            <p class="card-text font-small-3 mb-0">Products</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="d-flex flex-row">
                                        <div class="avatar bg-light-success me-2">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">${{number_format($orders->sum('total'))}}</h4>
                                            <p class="card-text font-small-3 mb-0">Revenue</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>

            <div class="row match-height">
                <div class="col-lg-4 col-12">
                    <div class="row match-height">
                        <!-- Bar Chart - Orders -->
                        <div class="col-lg-6 col-md-3 col-6">
                            <div class="card">
                                <div class="card-body pb-50">
                                    <h6>Orders</h6>
                                    <h2 class="fw-bolder mb-1">{{$orders->count()}}</h2>
                                </div>
                            </div>
                        </div>
                        <!--/ Bar Chart - Orders -->

                        <!-- Line Chart - Profit -->
                        <div class="col-lg-6 col-md-3 col-6">
                            <div class="card card-tiny-line-stats">
                                <div class="card-body pb-50">
                                    <h6>Profit</h6>
                                    <h2 class="fw-bolder mb-1">${{number_format($transactions->pluck('order')->sum('total'))}}</h2>

                                </div>
                            </div>
                        </div>
                        <!--/ Line Chart - Profit -->

                        <!-- Earnings Card -->
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="card earnings-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="card-title mb-1">Earnings</h4>
                                            <div class="font-small-2">This Month</div>
                                            <h5 class="mb-1">${{number_format($monthly_earning)}}</h5>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Earnings Card -->
                    </div>
                </div>

                <!-- Revenue Report Card -->
                <div class="col-lg-8 col-12">
                    <div class="card card-revenue-budget">
                        <div class="row mx-0">
                            <div class="col-md-12 col-12 revenue-report-wrapper">
                                <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                </div>
                                {!! $chart->container() !!}
                            </div>

                        </div>
                    </div>
                </div>
                <!--/ Revenue Report Card -->
            </div>

            <div class="row match-height">
                <!-- Company Table Card -->
                <div class="col-lg-8 col-12">
                    <div class="card card-company-table">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->take(10) as $order)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <a class="fw-bolder" href="{{route('order.show',[$order->order_number])}}">#{{$order->order_number}}</a>

                                                    </div>
                                                </div>
                                            </td><td>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <div class="fw-bolder">{{$order->user->name}}</div>
                                                        <div class="font-small-2 text-muted">{{$order->user->email}}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bolder mb-25">${{number_format($order->total,2)}}</span>
                                                    <span class="font-small-2 text-muted">{{$order->created_at->diffForHumans()}}</span>
                                                </div>
                                            </td>
                                            <td>{{$order->payment_method}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    <span class="fw-bolder me-1">{{Str::ucfirst($order->status)}}</span>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Company Table Card -->
                 <!-- Transaction Card -->
                 <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-transaction">
                        <div class="card-header">
                            <h4 class="card-title">Transactions</h4>
                            <div class="dropdown chart-dropdown">
                                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{route('transaction.index')}}">View All</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($transactions->groupBy('payment_method') as $index => $transaction )
                            <div class="transaction-item">
                                <div class="d-flex">
                                    <div class="avatar bg-light-primary rounded float-start">
                                        <div class="avatar-content">
                                            <img src="{{ asset($transaction->first()->order->payment_method_image) }}" alt="{{ $transaction->first()->order->payment_method_image }}" height="20" width="20" />
                                        </div>
                                    </div>
                                    <div class="transaction-percentage">
                                        <h6 class="transaction-title">{{$transaction->first()->order->payment_method}}</h6>
                                        <small>Total Transactions</small>
                                    </div>
                                </div>
                                <div class="fw-bolder text-success">${{number_format($transaction->pluck('order.total')->sum(),2)}}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--/ Transaction Card -->

            </div>
        </section>
        <!-- Dashboard Ecommerce ends -->

    </div>

@endsection

@push('script')
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endpush
