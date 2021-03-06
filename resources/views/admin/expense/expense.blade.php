@extends('admin.master')
@section('title')
 Expense
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
{{--  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Expense</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ route('expense.create') }}" class="btn btn-primary">
                        + AddExpense
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
                <div class="to-do">
                    <table  id="example1" class="table table table-striped table-md example1">
                        <tbody><tr style="background: #232b55; color: white;">
                            <th>SL</th>
                                <th>Name</th>
                                <th>Amount </th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Data</th>
                            <th class="action-lists">Action</th>
                        </tr>
                        @foreach ($expenses as $key=>$expense)
                        <tbody>
                        <tr>
                            <td class="text-center" >{{$key+1}}</td>
                            <td class="text-center">{{$expense->name}}</td>
                            <td class="text-center">{{$expense->amount }}</td>
                            <td class="text-center">{{ $expense->month }}</td>
                            <td class="text-center">{{ $expense->year }}</td>
                            <td class="text-center">{{ $expense->date}}</td>

                            <td class="text-center">
                                <a href="{{ route('expense.edit',$expense->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                <a href="{{ route('expense.delete',$expense->id) }} " id="delete"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>
                </div>
            </div>

        </div>
    </div>
</section>  --}}



<!-- Content Wrapper. Contains page content -->
{{--  <div class="content-wrapper">  --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            {{--  <div class="row mb-2">
                <div class="col-sm-6 offset-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Expenses</li>
                    </ol>
                </div>
            </div>  --}}

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expense</h1>
                </div><!-- /.col -->


                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('expense.create') }}" class="btn btn-primary">
                            + AddExpense
                        </a>

                    </ol>


                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="filter d-flex dashboard-filter-btn">
                            <span style="font-size: large; font-weight: bold;"><i
                                    class="far fa-grip-vertical"></i>
                                </span>
                                    <div class="container">


<!-- Example single danger button -->
<div class="btn-group">
  {{--  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">  --}}
    {{--  <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">  --}}

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
                                EXPENSES LISTS
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
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Date</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                               
                                <tbody>
                                @foreach($expenses as $key => $expense)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $expense->name }}</td>
                                        <td>{{ number_format($expense->amount, 2) }}</td>
                                        <td>{{ $expense->month }}</td>
                                        <td>{{ $expense->year }}</td>
                                        <td>{{ $expense->created_at->format('d M Y h:i:s A') }}</td>


                                        <td class="text-center">
                                            <a href="{{ route('expense.edit',$expense->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                            <a href="{{ route('expense.delete',$expense->id) }} " id="delete"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                        </td>

                                        {{--  <td>
                                            <a href="{{ route('expense.edit', $expense->id) }}" class="btn
                                                btn-info">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <button class="btn btn-danger" type="button" onclick="deleteItem({{ $expense->id }})">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                            <form id="delete-form-{{ $expense->id }}" action="{{ route('expense.delete', $expense->id) }}" method="post"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>  --}}
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

