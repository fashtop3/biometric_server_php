<?php

namespace App\Http\Controllers;

use App\Capture;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CaptureController extends Controller
{
    public function index()
    {
        return Capture::all();
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $input['device_id'] = '1';
        $input['cid'] = time(0);

        try{
            Capture::create($input);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(['message'=> "data saved"]);
    }
}
