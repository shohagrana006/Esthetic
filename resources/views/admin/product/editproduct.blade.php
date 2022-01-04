@extends('admin.master')
@section('title')
Edit Product
@endsection
@section('content')
     <div class="main_container" id="main">
        <section class="purchase-sec mt-3">
            <div class="container">
                <h1>Edit Products</h1>
                <hr>
                <div class="row">
                    <div class="col-xl-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('product.update',  $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6" id="left-col">
                                    <!-- Supplier Buttons -->
                                    <div class="supplier dropdown">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}"  >

                                    </div>

                                    <!-- Brand Button -->
                                    <div class="dropdown">
                                        <label>Brand</label>
                                        <select name="brand_id"  >
                                            @foreach($brand as $row)
                                            <option value="{{ $row->id }}"
                                                    @isset($product)
                                                    @if($row->id==$product->brand_id)
                                                    selected=""
                                                @endif
                                                @endisset
                                            >
                                                {{ $row->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <!-- Price Rate section -->
                                    <div class="dropdown">
                                        <label>Business & Location</label>
                                        <select name="branch_id">
                                          @foreach($branch as $row)
                                          <option value="{{ $row->id }}"
                                                  @isset($product)
                                                  @if($row->id==$product->branch_id)
                                                  selected=""
                                              @endif
                                              @endisset
                                          >
                                              {{ $row->branch_name }}</option>
                                      @endforeach
                                        </select>
                                    </div>
                                    <!-- Applicable tax Section -->
                                    <div class="purchase-status dropdown">
                                        <label>Applicable Tax</label>

                                        <select name="product_applicable_tax" id="purchase-status" >
                                            <option value="1"
                                            @isset($product)
                                            {{ $product->product_applicable_tax == 1 ? 'selected' : '' }}
                                            @endisset
                                             >5%</option>
                                          <option value="2"
                                          @isset($product)
                                          {{ $product->product_applicable_tax == 2 ? 'selected' : '' }}
                                          @endisset
                                          >10%</option>
                                           <option value="3"
                                           @isset($product)
                                           {{ $product->product_applicable_tax == 3 ? 'selected' : '' }}
                                           @endisset
                                           >15%</option>
                                           <option value="4"
                                           @isset($product)
                                           {{ $product->product_applicable_tax == 4 ? 'selected' : '' }}
                                           @endisset
                                           >20%</option>
                                   </select>
                                    </div>

                                    <!-- Paid Rate section -->
                                    <div class="paid box">
                                        <label>Product Details</label>
                                        <input type="text" class="form-control" name="product_description"  value="{{ $product->product_description }}" >
                                    </div>


                                </div>
                                <!--  left-col Ends -->

                                <div class="col-xl-4 col-lg-4 col-md-6" id="middle-col">
                                    <!-- Product section -->
                                    <div class="product dropdown">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" name="sku" value="{{ $product->sku }} ">
                                    </div>
                                    <!-- Categories Buttons -->
                                    <div class="box-3">
                                        <label>Categories</label>
                                        <select name="category_id" id="supplier"  >
                                            @foreach($category as $row)
                                            <option value="{{ $row->id }}"
                                                    @isset($product)
                                                    @if($row->id==$product->category_id)
                                                    selected=""
                                                @endif
                                                @endisset
                                            >
                                                {{ $row->category_name }}</option>
                                        @endforeach
                                    </select>
                                        <a href="{{ route('category.create') }}" class="btn-supplier"><i class="far fa-plus-circle"></i></a>
                                    </div>


                                    <!-- Product Quality Section -->
                                    <div class="purchase-status dropdown">
                                        <label>Product status</label>
                                        <select name="product_status" id="purchase-status" >
                                            <option value="1"
                                            @isset($product)
                                            {{ $product->product_status == 1 ? 'selected' : '' }}
                                            @endisset
                                             >Normal</option>
                                          <option value="2"
                                          @isset($product)
                                          {{ $product->product_status == 2 ? 'selected' : '' }}
                                          @endisset
                                          >Good</option>
                                           <option value="3"
                                           @isset($product)
                                           {{ $product->product_status == 3 ? 'selected' : '' }}
                                           @endisset
                                           >Avarage</option>
                                           <option value="4"
                                           @isset($product)
                                           {{ $product->product_status == 4 ? 'selected' : '' }}
                                           @endisset
                                           >Bad</option>
                                   </select>
                                    </div>


                                    <!-- Selling Tax Button -->
                                    <div class="dropdown">
                                        <label>Selling Tax</label>
                                        <select name="product_selling_tax" id="purchase-status" >
                                            <option value="1"
                                            @isset($product)
                                            {{ $product->product_selling_tax == 5 ? 'selected' : '' }}
                                            @endisset
                                             >5%</option>
                                          <option value="2"
                                          @isset($product)
                                          {{ $product->product_selling_tax == 10 ? 'selected' : '' }}
                                          @endisset
                                          >10%</option>
                                           <option value="3"
                                           @isset($product)
                                           {{ $product->product_selling_tax == 15 ? 'selected' : '' }}
                                           @endisset
                                           >15%</option>
                                           <option value="4"
                                           @isset($product)
                                           {{ $product->product_selling_tax == 20 ? 'selected' : '' }}
                                           @endisset
                                           >20%</option>
                                   </select>
                                    </div>
                                    <!-- unit section -->
                                    <div class="dropdown">
                                        <label>Unit</label>
                                        <select name="unit_id"  >
                                            @foreach($unit as $row)
                                            <option value="{{ $row->id }}"
                                                    @isset($product)
                                                    @if($row->id==$product->unit_id)
                                                    selected=""
                                                @endif
                                                @endisset
                                            >
                                                {{ $row->unit_name }}</option>
                                        @endforeach
                                    </select>

                                    </div>


                                </div>
                                <!-- middle-col Ends -->

                                <div class="col-xl-4 col-lg-4 col-md-6" id="right-col">
                                    <!-- Barcode section -->
                                        <div class="purchase-status dropdown">
                                        <label>Barcode Type</label>
                                        <select name="barcode" id="purchase-status" >
                                            <option value="1"
                                            @isset($product)
                                            {{ $product->barcode == 1 ? 'selected' : '' }}
                                            @endisset
                                             >Barcode1</option>
                                          <option value="2"
                                          @isset($product)
                                          {{ $product->barcode == 2 ? 'selected' : '' }}
                                          @endisset
                                          >Barcode2</option>
                                           <option value="3"
                                           @isset($product)
                                           {{ $product->barcode == 3 ? 'selected' : '' }}
                                           @endisset
                                           >Barcode3</option>
                                           <option value="4"
                                           @isset($product)
                                           {{ $product->barcode == 4 ? 'selected' : '' }}
                                           @endisset
                                           >Barcode4</option>
                                   </select>
                                    </div>

                                    <!-- Sub-Categories Buttons -->
                                    <div class="box-3">
                                        <label>Sub Categories</label>
                                        <select name="sub_category_id" id="supplier"  >
                                            @foreach($sub_category as $row)
                                            <option value="{{ $row->id }}"
                                                    @isset($product)
                                                    @if($row->id==$product->sub_category_id)
                                                    selected=""
                                                @endif
                                                @endisset
                                            >
                                                {{ $row->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                        <a href="{{ route('subcategory.create') }}" class="btn-supplier"><i class="far fa-plus-circle"></i></a>
                                    </div>

                                    <!-- Supplier Section -->
                                    <div class="business-location dropdown">
                                        <label>Quantity</label>
                                        <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}">
                                    </div>
                                    <div class="business-location dropdown">
                                        <label>Selling price</label>
                                        <input type="text" class="form-control" name="seling_price" value="{{ $product->seling_price }}">
                                    </div>

                                    <div class="business-location dropdown">
                                        <label>Discound price</label>
                                        <input type="text" class="form-control" name="discount" value="{{$product->discount }}">
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
                            <button class="btn-purchase-submit" id="add-task">update </button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Lists Section -->


    </div>
     @endsection
