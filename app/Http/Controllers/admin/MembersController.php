<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Settings;
 

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.members.index',[
            'members' => Member::all(),
            'settings' => Settings::first()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Member::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'member has been deleted');
    }
}
