<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function dashboard(){
    	 $category = Category::all();
        return view('admin.dashboard',compact('category',$category));
    }
     
}
