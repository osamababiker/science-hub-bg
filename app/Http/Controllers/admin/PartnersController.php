<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Settings;
use Str;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.partners.index',[
            'partners' => Partner::all(),
            'settings' => Settings::first()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    function create() {
        return view('admin.partners.create', [
            'settings' => Settings::first()
        ]);
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|string',
            'address' => 'required',
            'logo' => 'required',
            'feedback' => 'required|string'
        ]);

        $partner = new Partner();
        if($request->has('logo')){
            $logo = $request->file('logo');
            $logo_name = time().'_'. rand(1000, 9999). '.' .$logo->extension();
            $logo->move(public_path('upload/partners'),$logo_name);
        }

        $partner->name = $request->name;
        $partner->link = $request->link;
        $partner->address = $request->address;
        $partner->feedback = $request->feedback;
        $partner->logo = $logo_name;
        $partner->save();

        return redirect()->back()->with('feedback', 'partner has been created');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $partner = partner::findOrFail($id);
        return view('admin.partners.edit', [
            'partner' => $partner,
            'settings' => Settings::first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){ 
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|string',
            'address' => 'required|string',
            'feedback' => 'required|string'
        ]);
        $partner = Partner::findOrFail($id);
        if($request->has('logo')){
            if(file_exists(public_path('upload/partners/'.$partner->logo))){
                unlink(public_path('upload/partners/'.$partner->logo));
            }
            $logo = $request->file('logo');
            $logo_name = time().'_'. rand(1000, 9999). '.' .$logo->extension();
            $logo->move(public_path('upload/partners'),$logo_name);
        }else{
            $logo_name = $partner->logo;
        }

        $partner->name = $request->name;
        $partner->link = $request->link;
        $partner->address = $request->address;
        $partner->logo = $logo_name;
        $partner->feedback = $request->feedback;
        $partner->save();

        return redirect()->back()->with('feedback', 'partner has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Partner::findOrFail($id)->delete();
        return redirect()->back()->with('feedback', 'partner has been deleted');
    }
}
