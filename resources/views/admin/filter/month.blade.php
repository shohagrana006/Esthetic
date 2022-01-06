@extends('admin.master')
@section('content')
    <div class="content">
        <div class="content-heading ">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>
                            <strong>Welcome to Admin Panel</strong>
                        </h2>

                    </div>
                </div>
                <div class="row">

                    {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"> --}}
                    <div class="col-xl-4" style="text-align: end">
                        <h3>{{ date(' F ') }} month report</h3>
                    </div>

                    <div class="col-xl-8">
                        <div class="filter d-flex dashboard-filter-btn">

                            <span style="font-size: large; font-weight: bold;"><i class="far fa-grip-vertical"></i>

                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter
                                </button>
                                <ul class="dropdown-menu">
                                    {{-- <li><a class="dropdown-item" href="{{ route('expense.today') }}">Today</a></li> --}}
                                    <li><a class="dropdown-item" href="{{ route('dashboard.today') }}">Today</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.yesterday') }}">Yesterday</a></li>
                                    {{--  <li><a class="dropdown-item" href="#">Last 7 days</a></li>
                                    <li><a class="dropdown-item" href="#">Last 30 days</a></li>  --}}
                                    <li><a class="dropdown-item" href="{{ route('dashboard.month') }}">This Month</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard.previous_month') }}">Last Month</a></li>
                                    {{--  <li><a class="dropdown-item" href="#">This Year</a></li>
                                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    <li><a class="dropdown-item" href="#">Current Financial Year</a></li>
                                    <li><a class="dropdown-item" href="#">Last Financial Year</a></li>  --}}
                                </ul>
                            </span>

                        </div>
                    </div>
                </div>



    </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="single-card">
                    <div class="card-icon">
                        <i class="far fa-money-check-alt"></i>
                    </div>
                    <div class="card-count">
                        <h5>Total Purchase <span>
                                <strong> <i class="fas fa-dollar-sign"></i>
                                    {{ $month_purchages->sum('purchage_quantity') }} Taka

                                </strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="single-card">
                    <div class="card-icon">
                        <i class="far fa-shopping-cart"></i>
                    </div>
                    <div class="card-count">
                        <h5>Total Expence<span>
                                <strong><i class="fas fa-dollar-sign"></i> {{ $month_expenses->sum('amount') }} Taka
                                </strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="single-card">
                    <div class="card-icon">
                        <i class="far fa-cubes"></i>
                    </div>
                    <div class="card-count">
                        <h5>Total Stock <br> Sell Value <span>
                                <strong><i class="fas fa-dollar-sign"></i>
                                    {{ $month_product->sum('seling_price') }}</strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="single-card">
                    <div class="card-icon">
                        <i class="far fa-boxes"></i>
                    </div>
                    <div class="card-count">
                        <h5>Total Products <span>
                                <strong><i class="fas fa-dollar-sign"></i> {{ $month_product->sum('quantity') }}</strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="single-card">
                    <div class="card-icon">
                        <i class="far fa-fragile"></i>
                    </div>
                    <div class="card-count">
                        <h5>Damaged Products <span>
                                <strong><i class="fas fa-dollar-sign"></i>
                                    {{ $month_damage->sum('damage_quantity') }}

                                </strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6">
                <div class="single-card">
                    <div class="card-icon">
                        <i class="far fa-fragile"></i>
                    </div>
                    <div class="card-count">
                        <h5>Profit Value <span>
                                <strong><i class="fas fa-dollar-sign"></i> 1000</strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- <div class="chart-heading">
        <div class="heading-title">
            <h4>
                <strong>Sales Last 30 Days</strong>
            </h4>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-chart-bar"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="dropdown-item" href="#">last 30 days</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">last 2 months</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">last 6 months</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">last year</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <div id="chartdiv"></div>
    </div>
@endsection
