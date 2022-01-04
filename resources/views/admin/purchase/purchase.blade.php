@extends('admin.master')
@section('title')
   Purchage
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
            <div class="col-sm-3">
                <h1 class="m-0">Purchage</h1>
            </div><!-- /.col -->
            <div class="col-sm-9">
                <ol class="breadcrumb float-sm-right m-2">
                    <a href="{{ route('purchage.create') }}" class="btn btn-primary">
                        + AddPurchage
                    </a>

                </ol>
                <ol class="breadcrumb float-sm-right m-2">
                    <a href="{{ route('purchage.pending') }}" class="btn btn-primary">
                        PendingPurchage
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
            <div class="col-xl 12">

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-xl example" >
                            <thead>

                        <tr style="background: #232b55; color: white;">
                                <th>SL</th>
                                <th>Date</th>
                                <th>Product Name </th>
                                <th>Supplier</th>
                                <th>Warehouse</th>
                                <th>Branch</th>
                                <th>Purchage_quantity</th>
                                <th>Purchage_unit_price</th>
                                <th>Parchage_payable_amount</th>
                                <td>Purchage_paid_amont</td>
                                <th>Parchage_due_amount</th>
                                <th>Parchage status</th>
                                 <th >Action</th>

                        </tr>
                    </thead>

                    <tbody>
                            @foreach ($purchases as $key=>$purchase)
                        <tr>
                            <td class="text-center" >{{$key+1}}</td>
                            <td class="text-center">{{$purchase->purchase_date}}</td>
                            <td class="text-center">{{$purchase->product->product_name }}</td>
                            <td class="text-center">{{ $purchase->supplier->supplier_name }}</td>
                            <td class="text-center">{{ $purchase->warehouse->warehouse_name}}</td>
                            <td class="text-center">{{ $purchase->branch->branch_name}}</td>
                            <td class="text-center">{{$purchase->purchage_quantity}}</td>
                             <td class="text-center">{{$purchase->purchage_unit_price }}</td>
                            <td class="text-center">{{ $purchase->parchage_payable_amount }}</td>
                            <td class="text-center">{{ $purchase->purchage_paid_amont}}</td>
                            <td class="text-center">{{$purchase->parchage_due_amount }}</td>
                            <td>
                                @if ($purchase->purchage_status==1)
                                   </i> <span class="badge badge-success">Received</span>
                                @elseif ($purchase->purchage_status==2)
                                   </i> <span class="badge badge-success">Partial</span>
                                @elseif ($purchase->purchage_status==3)
                                   <i class="fas fa-thumbs-up text-success"></i> <span class="badge badge-danger">pending</span>
                                   @else
                                </i> <span class="badge badge-success">Ordered</span>

                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('purchage.edit',$purchase->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                <a href="{{ route('purchage.delete',$purchase->id) }} " id="delete"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
            
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            
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

