<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Validator;

class MessagesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $rules = [
            'name' => 'required|string',
            'company_name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'plan' => 'required',
            'message' => 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return response()->json($validator->errors(), 400);

        $messsage = new Message();
        $messsage->name = $request->name;
        $messsage->company_name = $request->company_name;
        $messsage->email = $request->email;
        $messsage->phone = $request->phone;
        $messsage->plan = $request->plan;
        $messsage->message = $request->message;
        $messsage->save();

        return response()->json($messsage,201);

    }

}
