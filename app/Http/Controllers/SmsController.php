<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhoneNumber;
use Illuminate\Support\Facades\App;
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Symfony\Component\Debug\Exception\FatalErrorException;

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
            try
            {
                $fromModel = PhoneNumber::findOrFail($request->input('from'));
            }
            catch(ModelNotFoundException $e)
            {
                return response()->json(['message'=> '', 'error'=> 'from is not found']);
            }

            try
            {
                $toModel = PhoneNumber::findOrFail($request->input('to'));
            }
            catch(ModelNotFoundException $e)
            {
                return response()->json(['message'=> '', 'error'=> 'to is not found']);
            }

            $this->validateSms($_REQUEST);
        }
        catch(FatalErrorException $e)
        {
            return response()->json(['message'=> $e->getMessage(), 'error'=> 'something went wrong']);
        }


        return response()->json(['message'=> 'inbound sms ok', 'error'=> '']);
    }

    //

    private function validateSms(Request $request) {
        $this->validate($request, [
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
    }
}
