<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodItem;
use App\order;
use App\User;
class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == "Restaurant"){
        $oList = order::where('R_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $person = User::where('id', $oList->U_id)->first();
    }
        if(auth()->user()->role == "User"){
            $oList = order::where('U_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
            $person = User::where('id', $oList->R_id)->first();
        }
        
        $food = foodItem::where('id', $oList->F_id)->first(); 
        
       return view('rHome.orders')->with('person', $person)->with('food', $food);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->role =="User"){
        $this->validate($request, [
            'F_id' => '',
            'R_id' => '',
            'U_id' => '',    
        ]);

        $nOrder = new order();
        $nOrder->F_id = $request->F_id;
        $nOrder->U_id = $request->U_id;
        $nOrder->R_id = $request->R_id;
        $nOrder->save();
        return view('/home');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
