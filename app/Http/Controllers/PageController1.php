<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page; 
use App\Product;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
      * @return \Illuminate\Http\Response
     */
     public function __construct()
    { 
        // $this->middleware('auth');
    }
    public function index()
    {  
        $page=Page::all()->sortBy('sequence');
        return view('admin.page.allpage',compact("page",$page));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.new');
    }
     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      
    public function store(Request $request)
    {
        
        $Page = new Page;

        $Page->page_name = $request->name;
        $Page->description = $request->description;
        // Get feature image
        $file = $request->file('image');
        $destinationPath = 'images/Page/';
        $Page->image = $file->getClientOriginalName();
        $file->move($destinationPath,$file->getClientOriginalName());

        $max_order = Page::max('sequence');
        if($max_order){$Page->sequence = ++$max_order;}
        else{$Page->sequence = 01;}
        $Page->save();
 
         
        return redirect()->route('aboutus');
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
        $page = Page::find($id); 
        return view('admin.page.edit', compact("page"));
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
        // return $request;die;
        $Page = Page::find($id);

        $Page->page_name = $request->name;
        $Page->description = $request->description;
        
        $file = $request->file('image');
        if(empty($file)){
           $Page->image = $request->old_img; 
        }else{
            $destinationPath = 'images/Page/';
            $Page->image = $file->getClientOriginalName();
            $file->move($destinationPath,$file->getClientOriginalName());
        }

        $Page->update();
         return redirect()->route('aboutus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        subcategory::where('page_id',$id)->delete();
        $page = Page::find($id);
        $page->delete();
        return redirect()->route('page');
    }

     
    public function sort_page(Request $request){
        // return $request;
        $page = $request->data;
        $i = 0;
        foreach ($page as  $id) {
            $page = Page::find($id);
            $page->sequence  = $i;
            $page->update();
            $i++;
        }


    } 
}
