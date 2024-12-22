<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Settings;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.messages.index', [
            'messages' => Message::paginate(15),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Message::where('id', $id)->delete();
        return redirect()->back()->with('feedback', 'message has been removed');
    }
}
