@extends('admin.master')
@section('content')
      <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-title">
                                            <h2>Sub Category Name <span>Add</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                                       
                                        <div class="row justify-content-center mt-3 save-form-border">
                                            <div class="col-md-5 col-sm-5">
                                                <form action="">
                                                    <label for=""><h5>Category</h5></label>
                                                    <select name="" class="form-select" id="">
                                                        <option value="">pen</option>
                                                        <option value="">book</option>
                                                        <option value="">beg</option>
                                                    </select>                                                    
                                                </form>
                                            </div>
                                            <div class="col-md-5 col-sm-5">
                                                <form action="">
                                                    <label for=""><h5>Sub Category</h5></label>
                                                    <input type="text" class="form-control" placeholder="Sub Category">
                                                    <div class="save-button"><input type="button" value="save"></div>
                                                </form>
                                            </div>
                                        </div>                                                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection