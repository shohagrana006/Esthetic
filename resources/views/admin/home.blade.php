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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="filter d-flex dashboard-filter-btn">
                        <span style="font-size: large; font-weight: bold;"><i
                                class="far fa-grip-vertical"></i> Filter</span>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Today</option>
                            <option value="2">Yesterday</option>
                            <option value="3">Last 7 days</option>
                            <option value="3">Last 30 days</option>
                            <option value="3">This Month</option>
                            <option value="3">Last Month</option>
                            <option value="3">This Month Last Year</option>
                            <option value="3">This Year</option>
                            <option value="3">Last Year</option>
                            <option value="3">Current Financial Year</option>
                            <option value="3">Last Financial Year</option>
                            <option value="3">Custom Range</option>
                        </select>
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
                                <strong> <i class="fas fa-dollar-sign"></i> 1000</strong>
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
                        <h5>Total Sale Value <span>
                                <strong><i class="fas fa-dollar-sign"></i> 1000</strong>
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
                        <h5>Stock - Sell Value <span>
                                <strong><i class="fas fa-dollar-sign"></i> 1000</strong>
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
                                <strong><i class="fas fa-dollar-sign"></i> 1000</strong>
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
                                <strong><i class="fas fa-dollar-sign"></i> 1000</strong>
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
                        <h5>Profit Value <span>
                                <strong><i class="fas fa-dollar-sign"></i> 1000</strong>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-heading">
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
    </div>
    <div id="chartdiv"></div>
  </div>
@endsection