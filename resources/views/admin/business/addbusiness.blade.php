@extends('admin.master')
@section('title')
   Bussiness
@endsection
@section('content')
      <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-title">
                                            <h2>Business Name <span>Add</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                                        <div class="addButton">
                                            <a class="btn bg-success" href="{{ route('bussiness.index') }}"><i class="fas fa-long-arrow-alt-left"></i>Back</a>
                                        </div>
                                        @error('bussiness_name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="row mt-3 save-form-border ">
                                            <div class="col-md-6 col-sm-6">
                                                <form action="{{ route('bussiness.store') }}" method="POST">
                                                    @csrf
                                                    <label for=""><h5>Business Name</h5></label>
                                                    <input type="text" class="form-control" name="bussiness_name" placeholder="Business Name">
                                                    <button class="btn mt-2" type="submit"><strong>Save</strong></button>
                                                </form>
                                            </div>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection
