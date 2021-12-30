@extends('admin.master')
@section('content')
      <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-title">
                                            <h2>Unit Name <span>Add</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                                        <div class="addButton">
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

                                            <form action="{{ route('unit.update', $unit->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <label for=""><h5>Unit Name</h5></label>

                                                <input type="text" class="form-control" name=" unit_name" class="form-control @error('unit_name') is-invalid @enderror" name="unit_name" value="{{  $unit->unit_name  }}"><br>

                                                {{-- <input type="text" name="unit_name" class="form-control" value="{{  $unit->unit_name  }}"> --}}

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
