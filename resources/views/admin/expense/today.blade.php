@extends('admin.master')
@section('title')
Today Expenses
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
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Today Expense</h1>
                </div><!-- /.col -->


                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('expense.create') }}" class="btn btn-primary">
                            + AddExpense
                        </a>
                        <a href="{{ route('expense.index') }}" class="btn btn-success">
                            Back
                       </a>

                    </ol>
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
 <div class="filter d-flex dashboard-filter-btn">
        <span style="font-size: large; font-weight: bold;"><i
                class="far fa-grip-vertical"></i></span>
        <div class="container">
    <!-- Example single danger button -->
        <div class="btn-group">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
        </button>
        <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ route('expense.today') }}">Today Expence</a></li>
    <li><a class="dropdown-item" href="{{ route('expense.month') }}">Monthly Expence</a></li>
    <li><a class="dropdown-item" href="{{ route('expense.yearly') }}">Yearly Expence</a></li>
    </ul>
    </div>
</div>

            </div>
         </div>
     </div>
</div><!-- /.col -->
 </div><!-- /.row -->




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
                            <h3 class="card-title">
                                Today EXPENSES LISTS
                            <small class="text-primary">{{ date('d F Y') }}</small>

                            </h3>
                            <div class="float-sm-right">
                                <p class="text-danger pull-right">Total Expenses : {{ $expenses->sum('amount') }} Taka</p>

                            </div>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>

                                    <tr>
                                        <th>Serial</th>
                                        <th>Expense Title</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>


                                </thead>

                                <tbody>
                                @foreach($expenses as $key => $expense)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $expense->name }}</td>
                                        <td>{{ number_format($expense->amount, 2) }}</td>
                                        <td>{{ $expense->created_at->format('h:i:s A') }}</td>


                                        <td class="text-center">
                                            <a href="{{ route('expense.edit',$expense->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                            <a href="{{ route('expense.delete',$expense->id) }} " id="delete"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
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

