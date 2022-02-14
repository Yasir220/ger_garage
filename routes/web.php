<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/pages/{id}','HomeController@pages')->name('pages');  
Route::get('/new_arrival','HomeController@new_arrival')->name('new_arrival');
Route::get('/', 'HomeController@index');
Route::get('/home','HomeController@index');

 
Route::get('/productpage', function () {   return view('product'); });
Route::get('/about', 'HomeController@about')->name('about'); 
Route::get('/password_hash/{pass}', 'HomeController@password_hash')->name('password_hash');   
Route::get('/contact','HomeController@contact')->name('contact'); 
Route::get('/page','HomeController@page')->name('page');
Route::get('/CardicMedia','HomeController@CardicMedia')->name('CardicMedia');
Route::post('/SendMail','HomeController@SendMail')->name('SendMail');
Route::post('/SendcareerMail','HomeController@SendcareerMail')->name('SendcareerMail');
Route::post('/SendFeedbackMail','HomeController@SendFeedbackMail')->name('SendFeedbackMail');
Route::get('/warrantiesandPolicies','HomeController@warranties')->name('warrantiesandPolicies');
Route::get('/InstrumentsCare','HomeController@InstrumentsCare')->name('InstrumentsCare');

Route::get('/category/{id}','HomeController@category')->name('category'); 
Route::get('/products/{id}/{slug}','HomeController@productsbycat')->name('products');
Route::get('/productsbycat/{id}','HomeController@productsbycat')->name('productsbycat');
Route::get('productbyid/{id}','HomeController@productbyid')->name('productbyid');    
Route::get('/new_products','ProductsController@create')->name('new_products');
Route::post('/products/store', 'ProductsController@store');
Route::get('/admin/productss','ProductsController@index')->name('productss'); 
Route::get('/product/{id}','ProductsController@show')->name('product');
Route::get('/product_edit/{pid}','ProductsController@edit')->name('product_edit');  
Route::put('/product/Update/{id}','ProductsController@update')->name('product_update'); 
Route::get('/del_img/{id}','ProductsController@del_img')->name('del_img'); 
Route::get('/del_product/{id}','ProductsController@destroy')->name('del_product'); 
    


Route::get('/new_events', 'EventsController@create')->name('new_events');
Route::get('/eventss', 'EventsController@index')->name('eventss');
Route::post('/events/store','EventsController@store');
Route::get('/events_edit/{id}','EventsController@edit')->name('events_edit');
Route::put('/event/update/{id}','EventsController@update')->name('update_event');
Route::get('/del_event/{id}','EventsController@destroy')->name('del_event');
Route::get('/newsevents','HomeController@newsevents')->name('newsevents');
  
Route::get('/new_vehicle', 'VehicleController@create')->name('new_vehicle');
Route::get('/vehicless', 'VehicleController@index')->name('vehicless');
Route::post('/vehicle/store','VehicleController@store');
Route::get('/vehicle_edit/{id}','VehicleController@edit')->name('vehicle_edit');
Route::put('/vehicle/update/{id}','VehicleController@update')->name('vehicle_update');
Route::get('/del_vehicle/{id}','VehicleController@destroy')->name('del_vehicle');
Route::get('/newvehicle','VehicleController@newsevents')->name('newvehicle');


Route::get('/new_categories', 'CategoryController@create')->name('new_categories');
Route::post('/category/store','CategoryController@store');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category_edit/{id}','CategoryController@edit')->name('category_edit');
Route::get('/sub_category/{id}','CategoryController@sub_category')->name('sub_category');
Route::put('/category/update/{id}','CategoryController@update')->name('category_update');
Route::get('/del_cat/{id}','CategoryController@destroy')->name('del_cat');
 

Route::get('/new_page', 'PageController@create')->name('new_page');
Route::post('/page/store','PageController@store');
Route::get('/page', 'PageController@index')->name('page'); 
Route::get('/page_edit/{id}','PageController@edit')->name('page_edit'); 
Route::put('/page/update/{id}','PageController@update')->name('page_update');
Route::get('/del_page/{id}','PageController@destroy')->name('del_page');



Route::get('/view_subcat/{id}','CategoryController@view_subcat')->name('view_subcat');
Route::get('/del_subcat/{catid}/{id}','CategoryController@del_subcat')->name('del_subcat');
Route::get('/subcat_edit/{catid}/{id}','CategoryController@subcat_edit')->name('subcat_edit');
Route::put('/update_subcat/{id}','CategoryController@update_subcat')->name('update_subcat');
Route::get('/new_subcat/{id}','CategoryController@new_subcat')->name('new_subcat');
Route::post('/store_subcat','CategoryController@store_subcat')->name('store_subcat');

Route::get('/new_banner','BannerController@create')->name('new_banner');
Route::post('banner/store','BannerController@store')->name('banner_store');
Route::get('/banners','BannerController@index')->name('banners');
Route::get('/banners_edit/{id}','BannerController@edit')->name('banner_edit');
Route::put('/banner/update/{id}','BannerController@update')->name('banner_update');
Route::get('/del_banner/{id}','BannerController@destroy')->name('del_banner');


Route::get('/new_media','MediaController@create')->name('new_media');
Route::post('media/store','MediaController@store')->name('media_store');
Route::get('/medias','MediaController@index')->name('medias');
Route::get('/media_edit/{id}','MediaController@edit')->name('media_edit');
Route::put('/media/update/{id}','MediaController@update')->name('media_update');
Route::get('/del_media/{id}','MediaController@destroy')->name('del_media');
 

// CART Route

Route::post('/add_to_cart' ,'CartController@add_to_cart')->name('add_to_cart'); 
Route::post('/update_cart/{id}' ,'CartController@update_cart')->name('update_cart');
Route::get('/cart' ,'CartController@cartview')->name('cart'); 
Route::get('/removecart/{id}' ,'CartController@removecart')->name('removecart');  

Route::get('/checkout' ,'CartController@checkoutview')->name('checkout'); 
Route::get('/orderview' ,'CartController@orderview')->name('orderview'); 
Route::post('/order' ,'CartController@order')->name('order'); 




Route::get('/product_by_subcategory/{id}','ProductsController@product_by_subcategory')->name('product_by_subcategory');
Route::POST('sort_banner','BannerController@sort_banner')->name('sort_banner');
Route::POST('sort_category','CategoryController@sort_category')->name('sort_category'); 
Route::POST('sort_page','PageController@sort_page')->name('sort_page');
Route::POST('sort_subcategory','CategoryController@sort_subcategory')->name('sort_subcategory');
Route::POST('sort_products','ProductsController@sort_products')->name('sort_products');
Route::POST('sort_catlog','CatlogController@sort_catlog')->name('sort_catlog');
Route::POST('sort_compliance','CompliancesController@sort_compliance')->name('sort_compliance');
Route::POST('sort_media','MediaController@sort_media')->name('sort_media');
Route::POST('sort_event','EventsController@sort_event')->name('sort_event');


Route::get('/allvehilce_bills', 'HomeController@allvehilce_bills')->name('allvehilce_bills');
Route::get('/view_bills/{id}', 'HomeController@view_bills')->name('view_bills');


//Mananger all routes
 
Route::get('/requested_vehicle', 'ManagerController@requested_vehicles')->name('requested_vehicle');
Route::get('/accepted_vehicle', 'ManagerController@accepted_vehicles')->name('accepted_vehicle');
Route::get('/rejected_vehicle', 'ManagerController@rejected_vehicles')->name('rejected_vehicle');
  
Route::get('/accept_request/{id}','ManagerController@accept_request')->name('accept_request');
Route::get('/reject_request/{id}','ManagerController@reject_request')->name('reject_request'); 
Route::get('/del_request/{id}','ManagerController@destroy')->name('del_request');

                          //asign task

Route::get('/requested_task', 'ManagerController@requested_tasks')->name('requested_task'); 
Route::get('/assigned_task', 'ManagerController@assigned_tasks')->name('assigned_task'); 

 
Route::get('/rejected_task', 'ManagerController@rejected_tasks')->name('rejected_task');
 

Route::get('/assign_task/{id}','ManagerController@assign_tasks')->name('assign_task');
Route::put('/task_save/{id}','ManagerController@task_save')->name('task_save');
Route::get('/editassign_task/{id}','ManagerController@editassign_tasks')->name('editassign_task');
Route::put('/task_update/{id}','ManagerController@task_update')->name('task_update');

Route::get('/reject_task/{id}','ManagerController@reject_tasks')->name('reject_task'); 
Route::get('/del_task/{id}','ManagerController@del_task')->name('del_task');

Route::get('/mallvehilce_bill', 'ManagerController@allvehilce_bills')->name('mallvehilce_bill');
Route::get('/mview_bill/{id}', 'ManagerController@view_bill')->name('mview_bill');

 
//Worker all routes
 
Route::get('/all_repair', 'WorkerController@all_repairs')->name('all_repair');
Route::get('/accepted_repair', 'WorkerController@accepted_repairs')->name('accepted_repair');
Route::get('/rejected_repair', 'WorkerController@rejected_repairs')->name('rejected_repair');
Route::get('/holded_repair', 'WorkerController@holded_repairs')->name('holded_repair');

  
Route::get('/accept_repair/{id}','WorkerController@accept_repair')->name('accept_repair');
Route::get('/reject_repair/{id}','WorkerController@reject_repair')->name('reject_repair'); 
Route::get('/hold_repair/{id}','WorkerController@hold_repairs')->name('hold_repair'); 
Route::get('/del_repair/{id}','WorkerController@destroy')->name('del_repair');
            
                      //for adding spar parts to vehicle
Route::get('/allvehilce_accepted', 'WorkerController@allvehilce_accepteds')->name('allvehilce_accepted');
Route::get('/addvehicle_part/{id}', 'WorkerController@addvehicle_parts')->name('addvehicle_part');

Route::get('/new_subpart/{id}', 'WorkerController@new_subparts')->name('new_subpart');
Route::post('/store_part','WorkerController@store_parts')->name('store_part');
Route::post('/update_part/{id}','WorkerController@update_parts')->name('update_part');


Route::get('/sub_product/{id}', 'WorkerController@sub_product')->name('sub_product'); 
Route::get('/edit_subpart/{id}', 'WorkerController@edit_subparts')->name('edit_subpart');
Route::get('/delete_subpart/{id}', 'WorkerController@delete_subpart')->name('delete_subpart');

Route::get('/allvehilce_bill', 'WorkerController@allvehilce_bills')->name('allvehilce_bill');
Route::get('/view_bill/{id}', 'WorkerController@view_bill')->name('view_bill');



Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->namespace('Auth\Admin')->group(function(){
 
 Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
 Route::post('login', 'LoginController@login');
 Route::post('logout', 'LoginController@logout')->name('admin.logout');  

  if ($options['register'] ?? true) {
             Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
            Route::post('register', 'RegisterController@register')->name('admin.register');
        }


}); 

Route::prefix('manager')->namespace('Auth\Manager')->group(function(){
 
 Route::get('login', 'LoginController@showLoginForm')->name('manager.login');
 Route::post('login', 'LoginController@login');
 Route::post('logout', 'LoginController@logout')->name('manager.logout');  

  if ($options['register'] ?? true) {
             Route::get('register', 'RegisterController@showRegistrationForm')->name('manager.register');
            Route::post('register', 'RegisterController@register')->name('manager.register');
        }
 
}); 

Route::prefix('worker')->namespace('Auth\Worker')->group(function(){
 
 Route::get('login', 'LoginController@showLoginForm')->name('worker.login');
 Route::post('login', 'LoginController@login');
 Route::post('logout', 'LoginController@logout')->name('worker.logout');  

  if ($options['register'] ?? true) {
             Route::get('register', 'RegisterController@showRegistrationForm')->name('worker.register');
            Route::post('register', 'RegisterController@register')->name('worker.register');
        }


}); 

Route::prefix('admin')->namespace('Admin')->group(function(){ 
    Route::get('dashboard', 'DashboardController@index'); 
   }); 

Route::prefix('user')->namespace('User')->group(function(){ 
    Route::get('dashboard', 'DashboardController@index'); 
   }); 

Route::prefix('manager')->namespace('Manager')->group(function(){ 
    Route::get('dashboard', 'DashboardController@index'); 
   }); 

Route::prefix('worker')->namespace('Worker')->group(function(){ 
    Route::get('dashboard', 'DashboardController@index'); 
   }); 

Auth::routes();

  // Route::get('/home', 'HomeController@index')->name('home');
 