<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Settings;

class OrdersController extends Controller
{

    public function index() {
        return view('admin.orders.index', [
            'orders' => Order::all(),
            'settings' => Settings::first()
        ]);
    }

 
    public function edit(string $id) {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', [
            'order' => $order,
            'settings' => Settings::first()
        ]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'status' => 'required'
        ]);

        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('feedback', 'order status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'order has been deleted');
    }
}
