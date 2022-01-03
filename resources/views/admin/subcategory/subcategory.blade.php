@extends('admin.master')

@section('title')
 Subcategory
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
                            <h1 class="m-0">Sub Category List</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('subcategory.create') }}" class="btn btn-primary">
                                    + Addsubcategory
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
                                    <h3 class="card-title">All Sub Category List here</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table table-striped table-md">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                            <th>subCategory Name</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        @foreach($sub_category as $key=> $sub_categories)
                                                        <tr>
                                                            <td class="text-center">{{ $key+1 }}</td>
                                                            <td class="text-center"> {{$sub_categories->category->category_name}}</td>
                                                            <td class="text-center">{{ $sub_categories->sub_category_name }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ route('subcategory.edit',$sub_categories->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                                <a href="{{ route('subcategory.delete',$sub_categories->id) }}"method="POST">
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


