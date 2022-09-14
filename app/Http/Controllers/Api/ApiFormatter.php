<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ApiFormatter extends Controller
{
    protected static $response =  [
        'code' =>  null,
        'message' => null,
        'data' => null,
    ];

    public static function createApi($code = null, $message = null, $data = null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['code']);
    }
}
