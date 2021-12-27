@extends('admin.master')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                <h3><strong>List</strong></h3>
                <hr>
                <div class="row justify-content-between mb-3">
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="list-filter">
                            <div class="filter-icon">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </div>
                            <select class="form-select" aria-label="Default select example">
                        <option selected="">Filter</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="list-search">
                            <input type="search" placeholder="Search Here..." id="">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mb-3">
                    <div class="col-md-2 col-sm-2">
                        <div class="data-print"><strong>Print</strong></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Unite Range</th>
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
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endsection