@extends('admin.master')
@section('title')
Product
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
           <div class="content-header">
               <div class="container-fluid">
                   <div class="row mb-2">
                       <div class="col-sm-6">
                           <h1 class="m-0">Product List</h1>
                       </div><!-- /.col -->
                       <div class="col-sm-6">
                           <ol class="breadcrumb float-sm-right">
                               <a href="{{ route('product.create') }}" class="btn btn-primary">
                                   + AddProduct
                               </a>

                           </ol>
                       </div><!-- /.col -->
                   </div><!-- /.row -->
               </div><!-- /.container-fluid -->
           </div>
           <!-- /.content-header -->
           <section class="content">
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-12">
                           <div class="card">
                               <div class="card-header">
                                   <h3 class="card-title">All products List here</h3>
                               </div>
                               <!-- /.card-header -->
                               <div class="card-body">
                                <table id="example" class="table table-bordered example">
                                       <thead>
                                        <tr>

                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>unit</th>
                                            <th>category name</th>
                                            <th>subcategory name</th>
                                            <th>Barnd name</th>
                                            <th>Branch location</th>
                                            <th>sku</th>
                                            <th>Barcode</th>
                                            <th>product Status</th>
                                            <th>Applicable Tax</th>
                                            <th>Selling Tax</th>
                                            <th>Quantity</th>
                                            <th>Seling Price</th>
                                            <th>Discount</th>
                                            <th>Image</th>
                                            <th>Product Description</th>
                                            <th>action</th>
                                        </tr>
                                       </thead>
                                       @foreach($product as $key=> $products)
                                       <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $products->product_name }}</td>
                                           <td> {{$products->unit->unit_name}} </td>
                                           <td> {{$products->category->category_name}}</td>
                                           <td> {{$products->sub_category->sub_category_name}}</td>
                                           <td> {{$products->brand->brand_name}}</td>
                                           <td> {{$products->branch->branch_name}} </td>
                                           <td>{{ $products->sku }}</td>
                                           <td>{{ $products->barcode }}</td>
                                           <td>{{ $products->product_status }}</td>
                                           <td>{{ $products->product_applicable_tax }}%</td>
                                           <td>{{ $products->product_selling_tax }}%</td>
                                           <td>{{ $products->quantity }}</td>
                                           <td>{{ $products->seling_price}}</td>
                                           <td>{{ $products->discount}}</td>
                                           <td>
                                               <img src="{{asset('public/' .$products->image) }}" width="50px" height="70px"></td>


                                           <td>{{ $products-> product_description}}</td>
                                           <td>
                                               <a href="{{ route('product.edit',$products->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                               <a href="{{ route('product.delete',$products->id) }}"method="POST">
                                                   @csrf
                                                   @method('delete')
                                                   <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>

                                           </td>



                                       </tr>
                                   @endforeach
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           @push('js')

           <script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
           <script src="{{ asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
           <script src="{{ asset('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
           <script src="{{ asset('public/admin//plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
           <script src="{{ asset('public/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
           <script src="{{asset('public/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
           <script src="{{ asset('public/admin/plugins/jszip/jszip.min.js') }}"></script>
           <script src="{{ asset('public/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
           <script src="{{ asset('public/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
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
           @endpush
           @endsection



