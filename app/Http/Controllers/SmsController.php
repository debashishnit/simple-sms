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

    public function receiveSms(Request $request)
    {
        try {

            $validator = $this->validateSms($request);
            if($validator->fails()) {
                return response()->json(['message'=> '', 'error'=> $validator->errors()]);
            }

            if(!$fromModel = PhoneNumber::where('number' , $request->input('from'))->first())
                return response()->json(['message'=> '', 'error'=> 'from parameter is not found']);

            if(!$toModel = PhoneNumber::where('number' , $request->input('to'))
                                        ->where('account_id', \Auth::user()->__get('id'))
                                        ->first())
                return response()->json(['message'=> '', 'error'=> 'to parameter is not found']);

            if(trim($request->input('text')) == 'STOP'){
                $blocked_numbers = Cache::get('block_numbers');
                $blocked_numbers[$request->input('from') . '_' . $request->input('to')] = true;

                Cache::put('block_numbers', $blocked_numbers, 4*60);
            }
        }
        catch(Exception $e)
        {
            return response()->json(['message'=> $e->getMessage(), 'error'=> 'something went wrong']);
        }


        return response()->json(['message'=> 'outbound sms ok', 'error'=> '']);
    }

    public function sendSms(Request $request)
    {
        try {

            $validator = $this->validateSms($request);
            if($validator->fails()) {
                return response()->json(['message'=> '', 'error'=> $validator->errors()]);
            }

            $from = $request->input('from');
            $to = $request->input('to');

            if(!$toModel = PhoneNumber::where('number' , $request->input('from'))
                ->where('account_id', \Auth::user()->__get('id'))
                ->first())
                return response()->json(['message'=> '', 'error'=> 'from parameter is not found']);

            $blocked_numbers = Cache::get('block_numbers');
            if($blocked_numbers[$from . '_' . $to])
                return response()->json(['message' => '', 'error' => 'sms from ' . $from . ' to ' . $to . ' blocked by STOP request.']);

            $from_requests_count = Cache::get('from_requests_count_' . $from);
            if(!isset($from_requests_count)){
                $from_requests_count = 50;
                Cache::put('from_requests_count_' . $from, $from_requests_count, 24*60);
            }

            if($from_requests_count == 0)
                return response()->json(['message' => '', 'error' => 'limit reached for from ' . $from]);

            Cache::decrement('from_requests_count_' . $from);

        }
        catch(Exception $e)
        {
            return response()->json(['message'=> $e->getMessage(), 'error'=> 'unknown failure']);
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
