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
            'email' => 'required|email',
            'message' => 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
            return response()->json($validator->errors(), 400);

        $messsage = new Message();
        $messsage->name = $request->name;
        $messsage->email = $request->email;
        $messsage->message = $request->message;
        $messsage->save();

        return response()->json($messsage,201);

    }

}
