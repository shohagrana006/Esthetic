@extends('admin.master')
@section('content')
      <div class="pos-specing">
                        <div class="brand-area unit-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 sectionBg">
                                        <h5 class="" >@if(@isset($data))Edit Expense @else Add New Expense @endif</h5>
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
                                               <div class="row mt-3 save-form-border ">
                                              <form action="{{ isset($data) ? route('expense.update',$data->id) : route('expense.store') }}"
                                                    method="Post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for=""><h5>Expense Name</h5></label>
                                                        <input type="text" class="form-control" placeholder="Expense Name" name="name" value="{{ $data->name ?? ''  }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""><h5>Expense Amount</h5></label>
                                                        <input type="number" class="form-control" placeholder="Expense Amount" name="amount" value="{{ $data->amount ?? ''  }}">
                                                    </div>


                                                    <div class="form-group">
                                                        <a href="{{ route('expense.index') }}" class="btn btn-primary">
                                                             Back
                                                        </a>
                                                        <button type="Submit" class="btn btn-primary">
                                                            @isset($data)
                                                                <i class="fas fa-arrow-circle-up"></i>
                                                                <span>Update</span>
                                                            @else
                                                                <i class="fas fa-plus-circle"></i>
                                                                <span>Create</span>
                                                            @endisset
                                                        </button>
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
