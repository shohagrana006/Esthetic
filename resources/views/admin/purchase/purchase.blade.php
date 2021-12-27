@extends('admin.master')
@section('content')
       <section class="lists white-bg">
                        <div class="container">
                            <h1 style="color: rgb(0, 0, 0); margin-bottom: 10px;">Lists</h1>
                            <hr>
                            <div class="row align-items-center list-table" style="margin-left: 1%;">
                                <div class="col-md-4 col-sm-6">
                                    <div class="single-filter">
                                        <div>
                                            <!-- <label><i class="fas fa-grip-vertical"></i> Filter</label><br> -->
                                            <select class="btn-filter">
                                        <option value="1">Today</option>
                                        <option value="2">Yesterday</option>
                                        <option value="3">Last 7 Days</option>
                                        <option value="4">Last 15 Days</option>
                                        <option value="5">This Year</option>
                                        <option value="6">Last Year</option>
                                        <option value="7">Custom Range</option>
                                    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="single-filter text-center">
                                        <input class="btn-import-list" type="button" value="Import">
                                        <input class="btn-export-list" type="button" value="Export">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="list-search" style="width: 100%;">
                                        <form class="searchbar-list" action="#">
                                            <input class="srchbar-list" type="search" placeholder="search">
                                            <input class="btn-srch-list" type="button" value="search">
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xl 12">
                                    <div class="container">
                                        <div class="to-do">
                                            <table style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                                <tbody><tr style="background: #232b55; color: white;">
                                                    <th>SL No.</th>
                                                    <th>Product Name</th>
                                                    <th>Invoice No.</th>
                                                    <th>Quantity</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment Method</th>
                                                    <th class="action-lists">Action Buttons</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Maria Anders</td>
                                                    <td>123123</td>
                                                    <td>5</td>
                                                    <td>paid</td>
                                                    <td>Cash</td>
                                                    <td>
                                                        <a href="#"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                        <a href="#"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Maria Anders</td>
                                                    <td>123131</td>
                                                    <td>5</td>
                                                    <td>Paid</td>
                                                    <td>Cash</td>
                                                    <td>
                                                        <a href="#"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                        <a href="#"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                                    </td>
                                                </tr>

                                            </tbody></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    @endsection