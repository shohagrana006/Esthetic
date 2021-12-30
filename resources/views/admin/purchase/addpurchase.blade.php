@extends('admin.master')
@section('content')
      <section class="purchase-sec mt-3">
                        <div class="container">
                            <h1>Purchase</h1>
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
                                    <form action="{{ isset($data) ? route('purchage.update',$data->id) : route('purchage.store') }}"
                                        method="Post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4" id="left-col">
                                                <div class="purchase-date box-2">
                                                    <label>Purchase Date</label>
                                                    <input type="date" id="start" name="purchase_date" value="{{ $data->purchase_date ?? ''  }}">
                                                </div>
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
                                                <div class="payable box">
                                                    <label for="payable">Payable Amount</label>
                                                    <input type="text"  class="parchage_payable_amount" name="parchage_payable_amount"  value="{{ $data->parchage_payable_amount ?? ''  }}"><select name="payable">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>

                                            <div class="purchase-status dropdown">
                                                <label>Purchase Status</label>
                                                <select name="purchage_status" id="purchase-status" >
                                                 <option value="1"
                                                 @isset($data)
                                                 {{ $data->purchage_status == 1 ? 'selected' : '' }}
                                                 @endisset
                                                  >Received</option>
                                               <option value="2"
                                               @isset($data)
                                               {{ $data->purchage_status == 2 ? 'selected' : '' }}
                                               @endisset
                                               >Partial</option>
                                                <option value="3"
                                                @isset($data)
                                                {{ $data->purchage_status == 3 ? 'selected' : '' }}
                                                @endisset
                                                >Pending</option>
                                                <option value="4"
                                                @isset($data)
                                                {{ $data->purchage_status == 4 ? 'selected' : '' }}
                                                @endisset
                                                >Ordered</option>
                                        </select>
                                            </div>
                                            </div>
                                            <!--  left-col Ends -->

                                            <div class="col-xl-4 col-lg-4 col-md-4" id="middle-col">

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
                                                    <input type="number" class="amount"  name="purchage_quantity" id="purchage_quantity" value="{{ $data->purchage_quantity ?? ''  }}" placeholder="Select Quantity">
                                                </div>
                                                 <!-- Paid Rate section -->
                                                 <div class="paid box">
                                                    <label>Paid Amount</label>
                                                    <input type="text" class="amount"  name="purchage_paid_amont" id="purchage_paid_amont" value="{{ $data->purchage_paid_amont ?? ''  }}"><select name="paid">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                            </div>
                                                        <div class="business-location dropdown">
                                                            <label>Business Location/Branch</label>
                                                            <select  name="branch_id" required=""  id="product-sku">
                                                                @foreach($branchs as $row)
                                                                    <option value="{{ $row->id }}"
                                                                            @isset($data)
                                                                            @if($row->id==$data->branch_id)
                                                                            selected=""
                                                                        @endif
                                                                        @endisset
                                                                    >
                                                                        {{ $row->branch_name}}</option>
                                                                @endforeach
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
                                                                {{ $row->warehouse_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <!-- Purchase Date section -->
                                                 <div class="rate box">
                                                    <label>Unit_price</label>
                                                    <input type="text" class="amount" name="purchage_unit_price" id="purchage_unit_price" value="{{ $data->purchage_unit_price ?? ''  }}"><select name="rate">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>

                                                <!-- Due Amount section -->
                                                <div class="box">
                                                    <label>Due Amount</label>
                                                    <input type="text" class="parchage_due_amount" name="parchage_due_amount" id="parchage_due_amount" value="{{ $data->parchage_due_amount ?? ''  }}"><select name="due">
                                                <option value="1">Tk</option>
                                                <option value="2">$</option>
                                            </select>
                                                </div>
                                            <!-- right-col Ends -->
                                        </div>
                                        </div><br><br>
                                        <!-- Purchase Submit Button -->



                                        <div class="row justify-content-center">


                                            <div class="col-md-3 col-sm-6">

                                                <a href="{{ route('purchage.index') }}" class="btn-purchase-submit" id="add-task">
                                                    Back
                                               </a>
                                                {{-- <button class="btn-purchase-submit" id="add-task">Submit</button> --}}
                                            </div>
                                            <div class="col-md-3 col-sm-6">

                                                <button class="btn-purchase-submit" id="add-task">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script type="text/javascript">
                    $('.amount').keyup(function() {
                        var result= 00;
                     result = parseInt($('#purchage_quantity').val()) * parseInt($('#purchage_unit_price').val());
                   $('.parchage_payable_amount').val(result);

                   });
                   $('.amount').keyup(function() {
                        var result= 00;
                     result = parseInt($('.parchage_payable_amount').val()) - parseInt($('#purchage_paid_amont').val());
                   $('.parchage_due_amount').val(result);

                   });


                    </script>
                    @endsection
