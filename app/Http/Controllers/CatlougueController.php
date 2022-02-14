<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\catlougue;

class CatlougueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         $catlogs = catlougue::all()->sortBy('sequence');
        return view('admin.catlogues.allcats',compact("catlogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catlogues.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $catlog = new catlougue;

        $catlog->name = $request->name;
        // Get feature image
        $file = $request->file('pdf');
        $destinationPath = 'images/pdf';
        $catlog->file = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        $image = $request->file('image');
        $destinationPath = 'images/pdf';
        $catlog->image = $image->getClientOriginalName();
        $image->move($destinationPath,$image->getClientOriginalName());
        
        $max_order = catlougue::max('sequence');
        if($max_order){$catlog->sequence = ++$max_order;}
        else{$catlog->sequence = 01;} 
        
        $catlog->password = Hash::make($request->password);
        $catlog->save();
          
        return redirect()->route('pdfs');
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
        $catlog = catlougue::where('id', $id)->first();
        return view('admin.catlogues.edit',compact("catlog"));
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
    

        $catlog =catlougue::find($id);

        $catlog->name = $request->name;
        // Get feature image

        $file = $request->file('pdf');
        if(empty($file)){
           $catlog->image = $request->old_pdf; 
        }else{
            $destinationPath = 'images/pdf';
            $catlog->file = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $image = $request->file('image');
        if(empty($file)){
           $catlog->image = $request->old_img; 
        }else{
            $destinationPath = 'images/pdf';
            $catlog->image = $image->getClientOriginalName();
            $image->move($destinationPath,$image->getClientOriginalName());
        }

        // $catlog->password = Hash::make($request->password);
        $catlog->update();
          
        return redirect()->route('pdfs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catlog = catlougue::find($id);
        $catlog->delete();
        return redirect()->route('pdfs');
    }
    
    public function sort_catlog(Request $request){
        // return $request;
        $catlogs = $request->data;
        $i = 0;
        foreach ($catlogs as  $id) {
            $catlog = catlog::find($id);
            $catlog->sequence  = $i;
            $catlog->update();
            $i++;
        }
    }
}
