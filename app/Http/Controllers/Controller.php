<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function validation_error($message,$massages=[],$code){
//        $response=[
//            'status'=>false,
//            'message'=>$message,
//
//        ];
//        !empty($massages)?$response['errors']=$massages:null;
//        return  response()->json( $response,$code);
//    }
    public function RespondWithSuccess($massage='',$data=[],$code){
        return response()->json([
            'success'=>true,
            'message'=>$massage,
            'data'=>$data,
        ], $code);

    }
    public function RespondWithEorror($massage='',$data=[],$code){

        return response()->json([
            'error'=>true,
            'message'=>$massage,
            'data'=>$data,
        ], $code);

    }
}
