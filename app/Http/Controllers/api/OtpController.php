<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function sendforchangepass(){
        return response()->json(['message' => 'succes']);
    }
}
