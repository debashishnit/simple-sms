<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhoneNumber;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Mockery\CountValidator\Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class SmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function sendSms(Request $request)
    {
        try {

            $validator = $this->validateSms($request);
            if($validator->fails()) {
                return response()->json(['message'=> '', 'error'=> $validator->errors()]);
            }

            if(!$fromModel = PhoneNumber::where('number' , $request->input('from'))->first())
                return response()->json(['message'=> '', 'error'=> 'from is not found']);

            if(!$toModel = PhoneNumber::where('number' , $request->input('to'))
                                        ->where('account_id', \Auth::user()->__get('id'))
                                        ->first())
                return response()->json(['message'=> '', 'error'=> 'to is not found']);

            if(trim($request->input('text')) == 'STOP'){
                Cache::put('block_numbers', ['from' => $request->input('from'), 'to' => $request->input('to')], 4*60);
            }
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> $e->getMessage(), 'error'=> 'something went wrong']);
        }


        return response()->json(['message'=> 'outbound sms ok', 'error'=> '']);
    }

    //

    private function validateSms(Request $request) {
        $validator = \Validator::make($request->all(), [
            'from' => 'required|min:6|max:16',
            'from' => 'required|min:6|max:16',
            'text' => 'required|min:1|max:6'
        ], [
            'from.required' => "from is missing",
            'from.min' => "from is invalid",
            'from.max' => "from is invalid",
            'to.required' => "to is missing",
            'to.min' => "to is invalid",
            'to.max' => "to is invalid",
            'text.required' => "text is missing",
            'text.min' => "text is invalid",
            'text.max' => "text is invalid"
        ]);

        return $validator;
    }
}
