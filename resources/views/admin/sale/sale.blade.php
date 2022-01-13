@extends('admin.master')
@section('title')
   Sale
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
     @endpush
      <!-- Content Header (Page header) -->
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 offset-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pos</li>
                    </ol> --}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card">
                        <form action="{{ route('invoice.create') }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">
                                    Customer
                                    <span>
                                        <button type="submit" class="btn btn-sm btn-info float-md-right ml-3">Create Invoice</button>
                                        {{--  <a href="{{ route('customer.store') }}" class="btn btn-sm btn-primary float-md-right">Add New</a>  --}}
                                    </span>
                                </h3>

                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Customer</label>
                                    <select name="customer_id" class="form-control" required>
                                        <option value="" disabled selected>Select a Customer</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>

                    </div>


                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-info"></i>
                                Shopping Lists

                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($cart_products->count() < 1)
                                <div class="alert alert-danger">
                                    No Product Added
                                </div>
                            @else
                                <table class="table table-bordered table-striped text-center mb-3">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th width="17%">Qty</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>

                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart_products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $product->name }}</td>

                                            <form action="{{ route('admin.cart.update', $product->rowId) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <td style="width: 10px">
                                                    <input type="number" class="qty"  name="qty"  data-id="{{ $product->rowId }}"  value="{{ $product->qty }}" min="1" required="" style="width: 60px">

                                                </td>
                                                <td>{{ $product->price}}</td>
                                                <td>{{$product->price* $product->qty }}</td>

                                            </form>

                                            <td>
                                                <button class="btn btn-danger" type="button" onclick="deleteItem({{ $product->id }}) " data-id="{{ $product->rowId }}" id="removeProduct">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                {{-- <form id="delete-form-{{ $product->id }}" action="{{ route('cart.destroy', $product->rowId) }}" method="post"
                                                      style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <div class="alert alert-info">
                                <p>Quantity : {{ Cart::count() }}</p>
                                <p>Sub Total : {{ Cart::subtotal() }} Taka</p>
                                Tax : {{ Cart::tax() }} Taka
                            </div>
                            <div class="alert alert-success">
                                Total : {{ Cart::total() }} Taka
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">POS</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Product Code</th>
                                    <th>Add To Cart</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <form action="{{ route('invoice.add.card') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="product_name" value="{{ $product->product_name}}">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="seling_price" value="{{ $product->seling_price }}">

                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->product_name}}</td>
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>
                                                <img width="40" height="40" class="img-fluid" src="{{ URL::asset('public/'. $product->image) }}" alt="{{ $product->product_name }}">
                                            </td>
                                            <td>{{ number_format($product->seling_price, 2) }}</td>
                                            <td>{{ strtoupper($product->sku) }}</td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-success px-2">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div> <!-- Content Wrapper end -->
@endsection




@push('js')
<script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 {{-- <script src="{{ asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script> --}}
<script src="{{ asset('public/admin//plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
{{-- <script src="{{ asset('public/admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>



<script>

    $('body').on('keyup change','.qty', function(e){
		    let qty=$(this).val();
		    let rowId=$(this).data('id');
		    $.ajax({
		      url:'{{ url('cartproduct/updateqty/') }}/'+rowId+'/'+qty,
		      type:'get',
		      async:false,
		      success:function(data){
		        toastr.success(data);
		        location.reload();
		      }
		    });
		  });

		 $('body').on('click','#removeProduct', function(){
		    let id=$(this).data('id');
		    $.ajax({
		      url:'{{ url('cartproduct/remove/') }}/'+id,
		      type:'get',
		      async:false,
		      success:function(data){
		        toastr.success(data);
		        location.reload();
		      }
		    });
		  });




</script>




@endpush
