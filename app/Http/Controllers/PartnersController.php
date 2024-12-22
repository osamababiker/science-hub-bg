<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $partners = Partner::get();
        return response()->json($partners, 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $partner = Partner::findOrFail($id);
        return response()->json($partner, 200);
    }

}
