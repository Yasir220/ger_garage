<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon; 

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = coupon::all()->sortBy('sequence');
        return view('admin.coupons.index',compact("coupons"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public  function store(Request $request)
    { 
        
        
        $coupon = new coupon;
 
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->start_date = date("Y-m-d" ,strtotime($request->start_date)) ;
        $coupon->end_date = date("Y-m-d" ,strtotime($request->end_date)) ;
        $coupon->discount = $request->discount;
        if($request->has('free_shipping')){
            $coupon->free_shipping = 1;
        }else{
            $coupon->free_shipping = 0;
        }
        if($request->has('status')){
            $coupon->status = 1;
        }else{
            $coupon->status = 0;
        }
        $coupon->discount_type = $request->discount_type;
        
        $coupon->save();
          
        return redirect()->route('coupons.index')->with('success','coupon created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $coupon = coupon::where('id', $id)->first();
        return view('admin.coupons.edit',compact("coupon"));
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
        $coupon = coupon::find($id);

        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->start_date = date("Y-m-d" ,strtotime($request->start_date)) ;
        $coupon->end_date = date("Y-m-d" ,strtotime($request->end_date)) ;
        $coupon->discount = $request->discount;
        if($request->has('free_shipping')){
            $coupon->free_shipping = 1;
        }else{
            $coupon->free_shipping = 0;
        }
        if($request->has('status')){
            $coupon->status = 1;
        }else{
            $coupon->status = 0;
        }
        $coupon->discount_type = $request->discount_type;

        $coupon->update();
        return redirect()->route('coupons.index')->with('success','coupon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = coupon::find($id);
        $coupon->delete();
        return back()->with('success','coupon deleted successfully!');
    }
    public function sort_coupon_file(Request $request){
        $coupons = $request->data;
        $i = 0;
        foreach ($coupons as  $id) {
            $coupon = coupon::find($id);
            $coupon->sequence  = $i;
            $coupon->update();
            $i++;
        }
    }
}
