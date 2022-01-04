@extends('admin.master')
@section('title')
Edit Category
@endsection
@section('content')
      <div class="pos-specing">
            <div class="brand-area unit-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <h2> Edit Category</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                        <div class="row justify-content-center mt-3 save-form-border">
                            <div class="col-md-8 col-sm-8">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for=""><h5>Category Name</h5></label>

                                    <input type="text" class="form-control" name="category_name" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{  $category->category_name  }}"><br>

                                    <a href="{{ route('category.index') }}" class="btn btn-primary">
                                        Back
                                   </a>

                                    <button><strong>Update</strong></button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endsection
