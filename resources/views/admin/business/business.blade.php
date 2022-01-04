@extends('admin.master')
@section('title')
   Bussiness
@endsection
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
     @endpush
@section('content')
        <div class="pos-specing">
            <div class="brand-area unit-area">   
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                            <div class="addButton">
                                <a href="{{ route('bussiness.create') }}" class="btn bg-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</a>
                            </div>
                            <h3><strong> Business List</strong></h3>
                            <hr>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif           
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example1" class="table table table-striped table-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL</th>
                                                <th scope="col">Business Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                          
                                            @foreach ($bussiness as $bussi)                                                                                         
                                            <tr>
                                                <th>{{ $loop->index +1 }}</th>
                                                <td>{{ $bussi->bussiness_name }}</td>
                                                <td class="table-action">
                                                    <a href="{{ route('bussiness.edit',$bussi->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                    <a onclick="event.preventDefault();deleteForm({{ $bussi->id }})" href=""> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                                </td>
                                                <form id="bussi_dlt-{{ $bussi->id }}" action="{{ route('bussiness.destroy',$bussi->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </tr>  
                                            @endforeach                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="section-pagination">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item"><a class="page-link" href="#">Pre</a></li>
                                                <li class="page-item page-count"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                         
            </div>
        </div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

   function deleteForm(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector('#bussi_dlt-'+id).submit();
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    }



    
</script>
@endpush
        @endsection