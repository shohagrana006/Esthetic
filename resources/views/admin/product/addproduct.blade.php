@extends('admin.master')
@section('content')
     <div class="main_container" id="main">
        <section class="purchase-sec mt-3">
            <div class="container">
                <h1>Add Products</h1>
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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6" id="left-col">
                                    <!-- Supplier Buttons -->
                                    <div class="supplier dropdown">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name">

                                    </div>

                                    <!-- Brand Button -->
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

                                    

                                    {{-- <!-- Expiring Date section -->
                                    <div class="purchase-date box-2">
                                        <label>Expiring Date</label>
                                        <input type="date" id="expired" name="expiry_date" value=""  min="2018-01-01" max="2050-12-31">
                                    </div> --}}
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
                            {{-- <button class="btn-purchase-submit" id="add-task">Submit</button> --}}
                            <button class="btn-purchase-submit" id="add-task"><strong>Save</strong></button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Lists Section -->


    </div>
     @endsection
