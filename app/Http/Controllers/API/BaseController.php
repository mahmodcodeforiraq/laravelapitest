<?php
 
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller  
{
    public function sendResponse($result , $message){
        $response = $result;
        return response()->json($response , 200);
    }

    public function sendError($error , $errorMessages = [] , $code = 404){
        $response = [
            'success' => false ,
            'message' => $error
        ];
        if (!empty($errorMessages)) {
            # code...
            $response['date'] = $errorMessages;
        }
        return response()->json($response , $code);
        
    }
  
}