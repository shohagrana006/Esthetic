@extends('admin.master')
@section('content')
        <div class="container">
      <div class="row">
        <div class="col-xl-12 col-md-12 sectionBg">
            <h4 style="margin:0;">Expenses</h4>
            <hr>
            <div class="row justify-content-between mb-3">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                    <div class="single-expenses">
                        <button>Expenses</button>
                        <button>Add Expenses <i class="fa fa-plus-circle" aria-hidden="true"></i> </button>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-4">
                    <div class="expenses-search">
                        <input type="text" placeholder="Search....">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Expenses Name</strong></label>
                        <input type="text" placeholder="Expenses">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Ware House</strong></label>
                        <select class="form-select" aria-label="Default select example">
                    <option selected="">warehouse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Business Location</strong></label>
                        <select class="form-select" aria-label="Default select example">
                    <option selected="">warehouse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Expenses Amount</strong></label>
                        <input type="text" placeholder="Expenses">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Category</strong></label>
                        <select class="form-select" aria-label="Default select example">
                    <option selected="">warehouse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Expenses For</strong></label>
                        <select class="form-select" aria-label="Default select example">
                    <option selected="">warehouse</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Application Tax</strong></label>
                        <input type="text" placeholder="Expenses">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Total Amount</strong></label>
                        <input type="text" placeholder="Expenses">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-expenses">
                        <label for=""><strong>Attach File</strong></label>
                        <input type="file" name="" id="">
                        <div class="attach-info">
                            <span>Max size 10MB</span>
                            <span>(pdf,csv,zip,jpeg,png)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="single-expenses">
                        <label for=""><strong>Note</strong></label>
                        <textarea name="" id="" cols="30" rows="4" placeholder="Note"></textarea>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="expenses-button">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection