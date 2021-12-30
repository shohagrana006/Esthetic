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

                                           <form action="{{ isset($sub_category) ? route('subcategory.update',$sub_category->id) : route('subcategory.store') }}"
                                                        method="Post" enctype="multipart/form-data">
                                                      @csrf
                                                      {{--  @if (isset($sub_category->id))
                                                          @method('PUT')
                                                      @endif  --}}
                                                    <label for=""><h5>Category</h5></label>
                                                        <select name="category_id" class="form-select" >
                                                            @foreach($category as $row)
                                                            <option value="{{ $row->id }}"
                                                                    @isset($sub_category)
                                                                    @if($row->id==$sub_category->category_id)
                                                                    selected=""
                                                                @endif
                                                                @endisset
                                                            >
                                                                {{ $row->category_name }}</option>
                                                        @endforeach
                                                    </select>

                                            </div>
                                            <div class="col-md-5 col-sm-5">

                                                    <label for=""><h5>Sub Category</h5></label>
                                                    <input type="text" class="form-control" name="sub_category_name" value="{{  $sub_category->sub_category_name }} "><br>


                                                    <div class="save-button">
                                                    <input type="submit" value="Submit">
                                                    </div>

                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection
