{{-- @extends('admin.master')
@section('content')
       <section class="purchase-sec mt-3">
            <div class="container-fluid">
                <h1>Sales</h1>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        <form action="#">
                            <a href="" class="btn-purchase"><i class="far fa-plus-circle" aria-hidden="true"></i> Add Sales</a>

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6" id="left-col">
                                    <!-- Supplier Buttons -->
                                    <div class="box-3">
                                        <label>Supplier</label>
                                        <select name="supplier" id="supplier">
                                    <option value="1">Supplier-1</option>
                                    <option value="2">Supplier-2</option>
                                    <option value="3">Supplier-3</option>
                                </select>
                                        <a href="" class="btn-supplier"><i class="far fa-plus-circle" aria-hidden="true"></i></a>
                                    </div>
                                    <!-- Address Button -->
                                    <div class="adress box">
                                        <label>Address</label>
                                        <input type="text" placeholder="Supplier Address">
                                    </div>

                                    <!-- Price Rate section -->
                                    <div class="rate box">
                                        <label>Rate</label>
                                        <input type="text" id="rate" placeholder="Rate">
                                        <select name="rate">
                                            <option value="1">Tk</option>
                                            <option value="2">$</option>
                                        </select>
                                    </div>

                                    <!-- Paid Rate section -->
                                    <div class="paid box">
                                        <label>Paid Amount</label>
                                        <input type="text" id="paid" placeholder="Paid Amount"><select name="paid">
                                    <option value="1">Tk</option>
                                    <option value="2">$</option>
                                </select>
                                    </div>

                                </div>
                                <!--  left-col Ends -->

                                <div class="col-xl-4 col-lg-4 col-md-6" id="middle-col">
                                    <!-- Reference Buttons -->
                                    <div class="refer box-2">
                                        <label>Reference NO.</label>
                                        <input type="text" placeholder="Enter Referance Number">
                                    </div>

                                    <!-- Product section -->
                                    <div class="product dropdown">
                                        <label>Product/SKU</label>
                                        <select name="product/sku" id="product-sku">
                                    <option value="1">Product item-1</option>
                                    <option value="2">Product item-2</option>
                                    <option value="3">Product item-3</option>
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
                                        <input type="text" id="due" placeholder="Due Amount"><select name="due">
                                    <option value="1">Tk</option>
                                    <option value="2">$</option>
                                </select>
                                    </div>

                                </div>
                                <!-- middle-col Ends -->

                                <div class="col-xl-4 col-lg-4 col-md-6" id="right-col">
                                    <!-- Warehouse Section -->
                                    <div class="warehouse dropdown">
                                        <label>Warehouse</label>
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
                                        <input type="text" id="payable" placeholder="Payable Amount"><select name="payable">
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
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6" id="left-side">
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
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6" id="right-side">
                                    <div class="attach-filed box-2">
                                        <label>Attach Document</label>
                                        <input type="file" id="attach">
                                        <p>Max size 25MB (pdf,csv,doc,jpeg,png)</p>

                                    </div>

                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-3 col-sm-4">
                                    <button class="btn-purchase-submit" id="add-task">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @endsection --}}


        @extends('admin.master')
        @section('title')
        Add Product
        @endsection
        @section('content')
             <div class="main_container" id="main">
                <section class="purchase-sec mt-3">
                    <div class="container">
                        <h1>Add sales</h1>
                        <hr>
                        <div class="row">
                            <div class="col-xl-12">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <form action="{{ route('sale.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6" id="left-col">
                                            <!-- Supplier Buttons -->
                                            <div class="supplier dropdown">
                                                <label>Invoice No</label>
                                                <input type="hidden" name="invoice_no" value="{{ $invoice->invoice_no}}">
                                                {{-- <input type="hidden" name="invoice_no" value="@{{invoice_no}}"> --}}

                                            </div>

                                            {{-- <!-- Brand Button -->
                                            <div class="dropdown">
                                                <label>Brand</label>
                                                <select name="brand_id">
                                                  @foreach($brand as $brands)
                                                        <option value="{{ $brands->id }}">
                                                        {{ $brands->brand_name }}</option>
                                                  @endforeach

                                                </select>
                                            </div>

                                            <!-- Price Rate section -->
                                            <div class="dropdown">
                                                <label>Business & Location</label>
                                                <select name="branch_id">
                                                    @foreach($branch as $branches)
                                                        <option value="{{ $branches->id }}">
                                                        {{ $branches->branch_name }}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                            <!-- Applicable tax Section -->
                                            <div class="purchase-status dropdown">
                                                <label>Applicable Tax</label>
                                                <select name="product_applicable_tax">
                                                    <option value="0">None</option>
                                                    <option value="1">5%</option>
                                                    <option value="2">10%</option>
                                                    <option value="3">20%</option>
                                                </select>
                                            </div>

                                            <!-- Paid Rate section -->
                                            <div class="paid box">
                                                <label>Product Details</label>
                                                <input type="text" class="form-control" name="product_description" placeholder="Enter Product Details">
                                            </div>


                                        </div>
                                        <!--  left-col Ends -->

                                        <div class="col-xl-4 col-lg-4 col-md-6" id="middle-col">
                                            <!-- Product section -->
                                            <div class="product dropdown">
                                                <label>SKU</label>
                                                <input type="text" class="form-control" name="sku" placeholder="sku Name">
                                            </div>
                                            <!-- Categories Buttons -->
                                            <div class="box-3">
                                                <label>Categories</label>
                                                <select name="category_id" id="supplier">
                                                    @foreach($category as $categories)
                                                    <option value="{{ $categories->id }}">
                                                    {{ $categories->category_name }}</option>
                                              @endforeach
                                                </select>
                                                <a href="{{ route('category.create') }}" class="btn-supplier"><i class="far fa-plus-circle"></i></a>
                                            </div>


                                            <!-- Product Quality Section -->
                                            <div class="purchase-status dropdown">
                                                <label>Product status</label>
                                                <select name="product_status" id="purchase-status">
                                                    <option value="0">Normal</option>
                                                    <option value="1">Good</option>

                                                </select>
                                            </div>


                                            <!-- Selling Tax Button -->
                                            <div class="dropdown">
                                                <label>Selling Tax</label>
                                                <select name="product_selling_tax" >
                                                    <option value="1">None</option>
                                                    <option value="10">10%</option>
                                                    <option value="15">15%</option>
                                                    <option value="5">5%</option>
                                                </select>
                                            </div>
                                            <!-- unit section -->
                                            <div class="dropdown">
                                                <label>Unit</label>
                                                <select name="unit_id">
                                                    @foreach($unit as $units)
                                                    <option value="{{ $units->id }}">
                                                    {{ $units->unit_name }}</option>
                                              @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <!-- middle-col Ends -->

                                        <div class="col-xl-4 col-lg-4 col-md-6" id="right-col">
                                            <!-- Barcode section -->

                                                <div class="purchase-status dropdown">
                                                <label>Barcode Type</label>
                                                <select name="barcode">
                                                    <option value="Number">Number</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="sgsgs">sgsgs</option>
                                                    <option value="sfsf">sfsf</option>
                                                </select>
                                            </div>

                                            <!-- Sub-Categories Buttons -->
                                            <div class="box-3">
                                                <label>Sub Categories</label>
                                                <select name="sub_category_id" id="supplier">

                                                    @foreach($sub_category as $sub_categories)
                                                    <option value="{{ $sub_categories->id }}">
                                                    {{ $sub_categories->sub_category_name }}</option>
                                              @endforeach
                                                </select>
                                                <a href="{{ route('subcategory.create') }}" class="btn-supplier"><i class="far fa-plus-circle"></i></a>
                                            </div>




                                            <!-- Supplier Section -->
                                            <div class="business-location dropdown">
                                                <label>Quantity</label>
                                                <input type="text" class="form-control" name="quantity" placeholder="Number of Quantity">
                                            </div>
                                            <div class="business-location dropdown">
                                                <label>Selling price</label>
                                                <input type="text" class="form-control" name="seling_price" placeholder="Selling price">
                                            </div>

                                            <div class="business-location dropdown">
                                                <label>Discound price</label>
                                                <input type="text" class="form-control" name="discount" placeholder="Discound price">
                                            </div>

                                        </div>
                                        <!-- right-col Ends -->

                                    </div>

                                    <div class="row">
                                        <div class="col-xl-4" id="left-side">
                                            <div class="attach-filed box-2">
                                                <label>Product Image</label>
                                                <input type="file" id="attach"name="image" >
                                                <p>Max size 25MB (pdf,csv,doc,jpeg,png)</p>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- Purchase Submit Button -->
                                    <div class="save-button">
                                    <a href="{{ route('product.index') }}" class="btn btn-primary">
                                        Back
                                   </a>
                                   <input  type="submit" value="Submit">
                                          </form>
                            </div>
                        </div> --}}
                    </div>
                </section>
                <!-- Lists Section -->


            </div>
             @endsection
