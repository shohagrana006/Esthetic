<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Brian2694\Toastr\Facades\Toastr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function RespondWithSuccess($message){

        Toastr::success($message ,'Success');

    }
    public function RespondWithEorror($message){

        Toastr::error($message ,'Error' );

    }
}
