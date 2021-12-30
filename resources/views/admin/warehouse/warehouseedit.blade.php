@extends('admin.master')
@section('content')
      <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-title">
                                            <h2>Warehouse Name <span>Add</span></h2>
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

                                            <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                        <label for=""><h5>Warehouse Name</h5></label>

                                                        <input type="text" class="form-control" name="warehouse_name" class="form-control @error('warehouse_name') is-invalid @enderror" name="warehouse_name" value="{{  $warehouse->warehouse_name  }}"><br>

                                                        <label for=""><h5>Warehouse Address</h5></label>

                                                        <input type="text" class="form-control" name="warehouse_address" class="form-control @error('warehouse_address') is-invalid @enderror" name="warehouse_address"  value="{{ $warehouse->warehouse_address }}"><br>

                                                        <label for=""><h5>Warehouse Phone</h5></label>

                                                        <input type="text" class="form-control" name="warehouse_phone" class="form-control @error('warehouse_phone') is-invalid @enderror" name="warehouse_phone" value="{{ $warehouse->warehouse_phone }}" ><br>
                                                    <button><strong>Save</strong></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection
