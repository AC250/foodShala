<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodItem;
use App\order;
use App\User;
class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = foodItem::orderBy('name','asc')->paginate(10);
        return view('order.menu')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(auth()->user()->role == "Restaurant"){
        return view('rHome.create');
        }
        else
        return redirect('/home')->with('error', 'cannot create');
       
       // return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(auth()->user()->role =="Restaurant"){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'type' => ''    
        ]);

        $newItem = new foodItem();
        $newItem->name = $request->input('name');
        $newItem->type = $request->input('type');
        $newItem->price = $request->input('price');
        $newItem->restaurant_id = auth()->user()->id;
        $newItem->save();

        return redirect('/menuItems')->with('Success', 'new menu item added');
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
        
        $fItem = foodItem::Find($id);
        $rname = User::where('id',$fItem->restaurant_id)->get();
        return view('order.rList')->with('rname',$rname)->with('fItem',$fItem);
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
