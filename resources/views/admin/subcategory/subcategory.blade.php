@extends('admin.master')
@section('content')
        <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">


                                        <h3><strong>Sub Category List</strong></h3>
                                        <hr>
                                        <div class="row justify-content-between mb-3">
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="brand-show business-list-search">
                                                    <label for=""><h5 style="margin:0;">Show</h5></label>
                                                    <select name="" id="">
                                              <option value="1" selected="">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                          </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-sm-6">
                                                <div class="list-search">
                                                    <input type="search" placeholder="Search Here..." id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{--  <table class="table border">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">SL</th>
                                                            <th scope="col">Category Name</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td><strong>Bangladesh</strong></td>
                                                            <td class="table-action">
                                                                <a href="#"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                                <a href="#"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td><strong>Projukti71</strong></td>
                                                            <td class="table-action">
                                                                <a href="#"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                                <a href="#"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td><strong>Mark</strong></td>
                                                            <td class="table-action">
                                                                <a href="#"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                                <a href="#"> <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>  --}}

                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>

                                                        <th scope="col">SL</th>
                                                        <th scope="col">Category Name</th>
                                                        <th scope="col">subCategory Name</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sub_category as $key=> $sub_categories)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td> {{$sub_categories->category->category_name}}</td>
                                                            <td>{{ $sub_categories->sub_category_name }}</td>
                                                            <td>
                                                                <a href="{{ route('subcategory.edit',$sub_categories->id) }}"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                                                <a href="{{ route('subcategory.delete',$sub_categories->id) }}"method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <i style="color:red" class="fa fa-trash-alt" aria-hidden="true"></i> </a>

                                                            </td>



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
                    </div>
                    @endsection
