<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $orders = Order::with('user')
            ->with('course')->get();
        return response()->json($orders, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $rules = [
            'country' => "required|string",
            "city" => "required|string",
            'payment_method' => 'required|string',
            'notes' => 'nullable',
            'course_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        $order = new Order();
        $order->country = $request->country;
        $order->city = $request->city;
        $order->payment_method = $request->payment_method;
        $order->notes = $request->notes;
        $order->course_id = $request->course_id;
        $order->user_id = $request->user_id;
        $order->status = $request->status;
        $order->save();

        return response()->json([
            'message' => 'Your order has been created ',
            'order' => $order,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $orders = Order::where('user_id', $id)->with('user')
            ->with('course')->get();
        return response()->json($orders, 200);
    }

}
