<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\About;
use App\Event;
use App\Product;
use App\subcategory;
use App\catlougue;
use Illuminate\Support\Facades\Hash;
use Cart;
use PDF;
use Carbon;
use Mail;
use App\Vehicle;
use App\Bill;
use App\media;
use App\Mail\inquiryEmail;
use App\Mail\CareerMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    
    public function password_hash($pass){
        return Hash::make($pass);
    }

    public function contact(){
        return view('contact');
    }
    public function feedback(){
        return view('feedback');
    }
    public function career(){
        return view('career');
    } 
    public function company(){
        return view('company');
    }
    public function pages($id){ 
        $about=About::find($id);
        $data=About::where('id',$id)->get()->sortBy('sequence');
        return view('pages',compact("about",$data)); 
    }

    public function about(){
        return view('about');
    }

    public function CardicMedia(){
     $mediafiles = media::all()->sortBy('sequence');
     return view('media',compact('mediafiles'));
    }
    public function warranties(){
        return view('warranties');
    }
    public function InstrumentsCare(){
        return view('instrumentscare');
    }
    
    public function SendMail(Request $request){
        $Name = $request->name;
        $Email = $request->email;
        $Subject = $request->subject;
        $Message = $request->message;
    
        Mail::raw($Message, function($message) use ($request)
         {
             $message->from($request->email, $request->name);
             $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject($request->subject);
          
         });
         return redirect()->route('contact')->with('message', 'Message Sent Sucessfully');
    }

    public function SendcareerMail(Request $request){ 
              $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request ->email,
            'title' => $request ->title,
            'company' => $request ->company,
            'address' => $request ->address,
            'city' => $request ->city,
            'zip' => $request ->zip, 
            'upload' => $request ->upload, 
            'bodyMessage' => $request->message 
        );  
         Mail::send('Careermail',$data, function($message) use ($data)
         {  
             $message->from($data['email'], $data['name']);
             $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject( $data['title']); 
         });
         return redirect()->route('career')->with('message', 'Request Sent Sucessfully');
    }

    public function SendFeedbackMail(Request $request){ 
              $data1 = array(
            'cst_service' => $request->cst_service,   
            'sal_rep' => $request->sal_rep,
            'pro_sect' => $request->pro_sect,
            'pricing' => $request->pricing,
            'pro_performance' => $request->pro_performance,
            'compared' => $request->compared,
            'name' => $request->name,
            'email' => $request ->email,
            'title' => $request ->title,
            'company' => $request ->company,
            'address' => $request ->address,
            'city' => $request ->city,
            'state' => $request ->state,
            'zip' => $request ->zip,
            'phone' => $request->phone,
            'country' => $request ->country, 
            'fax' => $request->fax,
            'bodyMessage' => $request->message   
        );  

              
         Mail::send('FeedbackMail',$data1, function($message) use ($data1)
         {  
             $message->from($data1['email'], $data1['name']);
             $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject( $data1['title']);  
         });
         return redirect()->route('feedback')->with('message', 'Request Sent Sucessfully');
    }

      public function allvehilce_bills()
    {  
        $vehicles = Vehicle::where('task_status', "Assigned")->where('worker_status',"Working")->get(); 
        return view("user.bill.billvehicle",compact("vehicles",$vehicles));
    }

     public function view_bills($id)
    {  
        $bills= Bill::where('vehicle_id',$id)->get()->sortBy('sequence');
        return view("user.bill.bills",compact("bills","id"));
    }

    /*public function about(){
        return view('about');
    }*/
     public function admin_login(){
        return view('admin.admin_login');
    }

    public function category($id){
        $category = Category::find($id);
        $data = subcategory::where('category_id',$id)->get()->sortBy('sequence');
        // $data = Category::find($id)->subcategory;
        return view('category',compact('data','category')); 
    }
    // public function about($id){
    //      $about=About::all()->sortBy('sequence');
    //     return view('admin.about.allabout',compact("about",$about)); 
    // }
    
    public function productsbycat($id){
        // $products = subcategory::find($id)->products;
      $products = product::where('sub_category_id',$id)->orderBy('sequence','asc')->paginate(12);
        $catname = subcategory::select('name')->where('id',$id)->first();
        return view('product',compact('products','catname')); 
    }
    public function newsevents(){
        $events = Event::all()->sortBy('sequence');
        return view('events',compact('events'));
    }

    // public function productbyid($id){
    //     $product = Product::find($id);
    //     $sizes = Product::find($id)->sizes;
    //     $images = Product::find($id)->images;
    //     return view('singleproduct',compact('product','sizes','images'));
    // }
    
    public function productbyid($id){
        $product = Product::find($id);
        return view('singleproduct',compact('product'));
    }

    public function catlogue(){
        $catlogs = catlougue::all()->sortBy('sequence');;
        return view('catlogue',compact('catlogs'));
    }

    public function downloadcatlog(Request $request){
      $catlog = catlougue::select('file','password')->where('id',$request->id)->first();
      if(Hash::check($request->password, $catlog->password))
        {
        $pdfready = 'images/pdf/'.$catlog->file;  
        return response()->download($pdfready);  
        }
    }
    
    public function download()
    {
     $catlog = catlougue::select('file')->where('id',3)->where('password','cardic1234')->first();
     $pdfready = 'images/pdf/'.$catlog->file;  
      return response()->download($pdfready);
  }
  
  public function add_to_cart(Request $request){
    $data = $request->data;
    $arrayLength = count($data);
    try {
      for ($i = 0; $i < $arrayLength; $i++) {
      // return $data[$i][1];
      // $products = array($data[$i][0], $data[$i][1] , $data[$i][3],'0.00','size' => $data[$i][2]);
     Cart::add($data[$i][0],  $data[$i][1] , $data[$i][3] , '0.00', ['size' => $data[$i][2]]); 
    }
     $cart = Cart::content();
      return $cart;

    } 
    catch (\Exception $e) {
      return $e->getMessage();
    }

    
    
    // Cart::add($products);

   
      // $data = Cart::content();
      // return $products;




    // return $request;die;
   // return  array_merge($request->id,$request->name,$request->qty,$request->size,$request->check);die;
      // $id = $request->id;
      // $name = $request->name;
      // $size = $request->size;
      // $qty = $request->qty;
      
      
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
        //     return $cartItem->id === $request->id;
        // });
        // if (!$duplicates->isEmpty()) {
        //     Cart::search(function ($cartItem, $rowId) use ($request) {
        //      Cart::update($rowId,$request->qty);
        // });
           
        // }
        
      // Cart::add($id,  $name , $qty , '0.00', ['size' => $size]);
          //   return $data;
      // return redirect()->route('productbyid',$id)->with('message', 'Cart Item Added');
     
      
  }
  
  public function get_cart_data(){
      $data = Cart::content();  
      return $data; 
  }
  
  public function search (Request $request){
    $input = $request->search;
    
    $product = Product::where('name','LIKE','%'.$input.'%')->get();
    
        
//     $product = Product::where('name','like','%'.$input.'%')
//   ->orWhereHas('subcategory', function ($query) use ($input) {
//         $query->where('name', 'like', '%'.$input.'%');
//     })
//     ->orderBy('id');
    
    // $product = Product::whereHas('category', function($query) use($input) {
    // $query->where('name', 'like', '%'.$input.'%');
    // })->whereHas('subcategory', function($query) use($input) {
    // $query->where('name', 'like', '%'.$input.'%');
    // })->orWhere('name','LIKE','%'.$input.'%')->get();
    
    if(count($product)){
        return view('search' , compact("input","product"));
    }
    else{
   return view('search');   
  }
}


 public function inquiry(){
     $data = Cart::content();  
     return view('inquiry');
 }
public function cart(){
    return view('cart');
}

  public function checkout(Request $request){
      
           $products = Cart::content();
           $sender_name = $request->sender_name;
           $company_name = $request->company;
           $email = $request->email;
           $address = $request->address;
           $dev_address = $request->dev_address;
           $phone = $request->phone;
           $msg = $request->msg;
            // $data = ['title' => 'Welcome to HDTuto.com'];
            // $pdf = PDF::loadView('myPDF', $data);
            $mytime = Carbon\Carbon::now();
              
            
            $output = ' <img src="http://www.cardic.com.pk/images/logo.png">
            <h3>Sender Details</h3> 
            <p><strong>Date Time</strong>'.$mytime->toDateTimeString().'</p>
            <p><strong>Sender Name : </strong>'.$sender_name.'</p>
            <p><strong>Company Name : </strong>'.$company_name.'</p>
            <p><strong>Email : </strong>'.$email.'</p>
            <p><strong>Address : </strong>'.$address.'</p>
            <p><strong>Delivery Address : </strong>'.$dev_address.'</p>
            <p><strong>Phone : </strong>'.$phone.'</p>
            <p><strong>Instructions/Message : </strong>'.$msg.'</p>
            <hr>
     <h3 >Product Details</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Id</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Size</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Qty</th>
   </tr>
     ';  
     foreach($products as $product)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$product->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->options->size.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->qty.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     //  return $output;
     $pdf = \App::make('dompdf.wrapper');
     $pdf = $pdf->loadHTML($output);
    //  return $pdf->stream();
    
     $data = array(
    'name' => $sender_name,   
    'Company Name'=> $company_name,
    'email' => $email,
    'Phone #' => $phone,
    'pdf' => $pdf);
   
    file_put_contents("checkout.pdf", $pdf->output());
    // $getpdf = PDF::loadv('checkout.pdf',$pdf);
    
    $result = Mail::send('mail', $data, function($message) use ($data){

        // $pdf = PDF::loadFile('http://www.cardic.com.pk/checkout.pdf');

        $message->to('choudhry@cardic.com.pk','CardicInstruments')->subject('Product Invoice');

        $message->from($data['email'],$data['name']);

        // $message->attach($data['pdf']->output());
        // $message->attachData($pdf,'checkout.pdf');

      $message->attach("checkout.pdf");
    });
    // File::delete("checkout.pdf");
    Cart::destroy();
    return redirect()->route('cart')->with('message', 'Inquiry Sent Sucessfully');
          // var_dump($result );  
  }
  
  
  public function removecart($rowid){
      Cart::remove($rowid);
     return redirect()->route('cart')->with('message', 'Cart Item Removed'); 
 
}
public function new_arrival(){
    $new_product= Product::where('new_product', 1)->get();
    return view('new_product',compact('new_product'));
}

}



