@extends('admin.master')
@section('content')
      <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-title">
                                            <h2>Supplier Name <span>Add</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                                        <div class="addButton">
                                            <button><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</button>
                                        </div>
                                        <div class="row mt-3 save-form-border ">
                                            <div class="col-md-6 col-sm-6">
                                                <form action="{{ route('suppliers.store') }}" method="POST" >
                                                    @csrf
                                                    <label for=""><h5>Supplier Name</h5></label>
                                                    
                                                    <input type="text" class="form-control" name="supplier_name" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" value="{{ old('supplier_name') }}" placeholder="supplier Name"><br>
                                                    <label for=""><h5>Supplier Email</h5></label>
                                                    <input type="email" class="form-control" name="supplier_email" placeholder="supplier Email"><br>
                                                    <label for=""><h5>Supplier Email</h5></label>
                                                    <input type="text" class="form-control" name="supplier_phone_number" placeholder="supplier phone"><br>
                                                    <label for=""><h5>Supplier Name</h5></label>
                                                    <input type="text" class="form-control" name="supplier_about_info" placeholder="supplier address"><br>
                                                   <br> <button><strong>Save</strong></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection
