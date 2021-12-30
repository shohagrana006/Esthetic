@extends('admin.master')
@section('content')
      <section class="purchase-sec mt-3">
                        <div class="container">
                            <h1>Purchase</h1>
                            <hr>
                            <div class="row">
                                <div class="col-xl-12">
                                    <form action="{{ isset($data) ? route('purchage.update',$data->id) : route('purchage.store') }}"
                                        method="Post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4" id="left-col">
                                                <!-- Supplier Buttons -->
                                                <div class="box-3">
                                                    <label>Supplier</label>
                                                    <select  name="supplier_id" required="" id="supplier">
                                                        @foreach($suppliers as $row)
                                                            <option value="{{ $row->id }}"
                                                                    @isset($data)
                                                                    @if($row->id==$data->supplier_id)
                                                                    selected=""
                                                                @endif
                                                                @endisset
                                                            >
                                                                {{ $row->supplier_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <a href="{{ route('supplier.create') }}" class="btn-supplier"><i class="far fa-plus-circle" aria-hidden="true"></i></a>
                                                </div>
                                                 <!-- Quantity Button -->
                                                 <div class="quantity box-2">
                                                    <label>Quantity</label>
                                                    <input type="number" placeholder="Select Quantity">
                                                </div>

                                                {{-- <!-- Address Button -->
                                                <div class="adress box">
                                                    <label>Address</label>
                                                    <input type="text" placeholder="Supplier Address">
                                                </div> --}}

                                                <!-- Price Rate section -->
                                                <div class="rate box">
                                                    <label>Rate</label>
                                                    <input type="text" id="rate"><select name="rate">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>

                                                <!-- Paid Rate section -->
                                                <div class="paid box">
                                                    <label>Paid Amount</label>
                                                    <input type="text" id="paid"><select name="paid">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>

                                            </div>
                                            <!--  left-col Ends -->

                                            <div class="col-xl-4 col-lg-4 col-md-4" id="middle-col">
                                                <!-- Reference Buttons -->
                                                {{-- <div class="refer box-2">
                                                    <label>Reference NO.</label>
                                                    <input type="text" placeholder="Enter Referance Number">
                                                </div> --}}

                                                <!-- Product section -->
                                                <div class="product dropdown">
                                                    <label>Product</label>
                                                    <select  name="product_id" required=""  id="product-sku">
                                                        @foreach($products as $row)
                                                            <option value="{{ $row->id }}"
                                                                    @isset($data)
                                                                    @if($row->id==$data->product_id)
                                                                    selected=""
                                                                @endif
                                                                @endisset
                                                            >
                                                                {{ $row->product_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <!-- Quantity Button -->
                                                <div class="quantity box-2">
                                                    <label>Quantity</label>
                                                    <input type="number" placeholder="Select Quantity">
                                                </div>

                                                <!-- Due Amount section -->
                                                <div class="box">
                                                    <label>Due Amount</label>
                                                    <input type="text" id="due"><select name="due">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>

                                            </div>
                                            <!-- middle-col Ends -->

                                            <div class="col-xl-4 col-lg-4 col-md-4" id="right-col">
                                                <!-- Warehouse Section -->
                                                <div class="warehouse dropdown">
                                                    <label>Warehouse</label>
                                                    <select  name="warehouse_id" required=""  id="warehouse">
                                                        @foreach($warehouses as $row)
                                                            <option value="{{ $row->id }}"
                                                                    @isset($data)
                                                                    @if($row->id==$data->warehouse_id)
                                                                    selected=""
                                                                @endif
                                                                @endisset
                                                            >
                                                                {{ $row->warehouses_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select name="Warehouse" id="warehouse">
                                                <option value="1">Warehouse-1</option>
                                                <option value="2">Warehouse-2</option>
                                                <option value="3">Warehouse-3</option>
                                            </select>
                                                </div>
                                                <!-- Purchase Date section -->
                                                <div class="purchase-date box-2">
                                                    <label>Purchase Date</label>
                                                    <input type="date" id="start" name="trip-start" value="2022-01-12" min="2018-01-01" max="2050-12-31">
                                                </div>

                                                <!-- Payable amount section -->
                                                <div class="payable box">
                                                    <label for="payable">Payable Amount</label>
                                                    <input type="text" id="payable"><select name="payable">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>

                                                <!-- Purchase Status Section -->
                                                <div class="purchase-status dropdown">
                                                    <label>Purchase Status</label>
                                                    <select name="warehouse" id="purchase-status">
                                                <option value="1">Received</option>
                                                <option value="2">Partial</option>
                                                <option value="3">Pending</option>
                                                <option value="4">Ordered</option>
                                            </select>
                                                </div>
                                            </div>
                                            <!-- right-col Ends -->
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-4 col-sm-6" id="left-side">
                                                <div class="business-location dropdown">
                                                    <label>Business Location/Branch</label>
                                                    <select name="branch" id="branch">
                                                <option value="1">Bashundhara</option>
                                                <option value="2">Mirpur</option>
                                                <option value="1">Tongi</option>
                                                <option value="1">Badda</option>
                                                <option value="1">Gulshan</option>
                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6" id="right-side">
                                                <div class="attach-filed box-2">
                                                    <label>Attach Document</label>
                                                    <input type="file" id="attach">
                                                    <p>Max size 25MB (pdf,csv,doc,jpeg,png)</p>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Purchase Submit Button -->

                                        <div class="row justify-content-center">
                                            <div class="col-md-3 col-sm-6">
                                                <button class="btn-purchase-submit" id="add-task">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endsection
