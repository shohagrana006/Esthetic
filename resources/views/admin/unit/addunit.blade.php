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
                                            {{-- <button><i class="fa fa-plus-circle" aria-hidden="true"></i>Add</button> --}}
                                        </div>
                                        <div class="row mt-3 save-form-border ">
                                            <div class="col-md-6 col-sm-6">
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                                <form action="{{ route('unit.store') }}" method="POST" >
                                                    @csrf
                                                    <label for=""><h5>Unit Name</h5></label>

                                                    <input type="text" class="form-control" name=" unit_name" class="form-control @error('unit_name') is-invalid @enderror" name="unit_name" value="{{ old('unit_name') }}" placeholder="Unit Name"><br>
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
