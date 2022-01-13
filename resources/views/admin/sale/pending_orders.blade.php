@extends('admin.master')
@section('title')
Invoice
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
     @endpush
      <!-- Content Header (Page header) -->
@section('content')

    <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            {{--  <li class="breadcrumb-item active">Pending Oprders</li>  --}}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">PENDING Invoice LISTS</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center table-responsive-xl">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        {{--  <th>Order Status</th>  --}}
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($pendings as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->customer->customer_name }}</td>
                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $order->total_products }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            {{--  <td><span class="badge badge-warning">{{ $order->order_status }}</span></td>  --}}

                                            <td>
                                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-success">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('order.destroy', $order->id) }}" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                                {{--  <button class="btn btn-danger" type="button" onclick="deleteItem({{ $order->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>  --}}
                                                {{--  <form id="delete-form-{{ $order->id }}" action="{{ route('admin.order.destroy', $order->id) }}" method="post"
                                                      style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>  --}}
                                            </td>
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


