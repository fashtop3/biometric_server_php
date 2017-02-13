<?php

namespace App\Http\Controllers;

use App\Capture;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class CaptureController extends Controller
{
    public function index()
    {
//        dd(Auth::user());
        return Capture::all();
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $input['device_id'] = Auth::user()->id;
//        $input['cid'] = time(0);

        try{
            if(Capture::where('cid', $request->get('cid'))->first())
            {
                throw new Exception("Biometrics has been captured for the current user");
            }
            Capture::create($input);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json(['success'=> "data saved"], 200);
    }
}
