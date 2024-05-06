<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Mycontroller;
use App\Http\controllers\ClientController;

//for send the data
Route::post('insertClient',[ClientController::class,'store'])->name('insertClient');
//for showing the form
Route::get('addClient',[ClientController::class,'create']);


//task2
Route::get('/form',[Mycontroller::class,'showForm']);
Route::post('/receveform1',[Mycontroller::class,'receiveForm']);
Route::get('/showdata',[Mycontroller::class,'showData']);

#name routes
//first route: route to open the form
// @csrf  <!-- for creating input hidden token in HTML code -->
Route::get('form1', function (){
    return view('form1');
}); 

//second route:(route name) route to receive the data from the form
Route::post('receiveform1', function (){
    $fname = request('fname');
    $lname = request('lname');
    return 'First name is:'  .$fname .'<br>last name is:' .$lname ;
})->name('receveform1'); // ihis is the programming name what used in action form

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Route::get('result1',[Mycontroller::class,'get_data']);
//Route::get('test',[Mycontroller::class,'my_data']);
#route view
// Route::get('/', function () {
//     return view('welcome in my first website');
// });

// Route::get('SARA/{id?}', function ($id=0) {
//     return 'Optional Parameter ' . $id;
// })->where(['id' => '[0-9]+']);   //Regular Expression

// Route::get('/car/{name}/{id?}', function ($name, $id=0) {
//     return 'this Multiple Parametes ' . $name . "" . $id;
// })->where(['name'=>'[a-zA-Z]+', 'id'=>'[0-9]+']);  //Regular Expression - Multiple Parametes

// Route::get('SARA/{id?}', function ($id=0) {
//     return 'welcome ' . $id;
// })->whereNumber('id');  //ready method 

// Route::get('SARA/{name}', function ($name) {
//     return 'onother ready method ' . $name;
// })->whereAlpha('name');  //ready method 


#to check in group of values likes names
// Route::get('cours/{name}', function ($name) {
//     return 'My name is:  ' . $name;
// })->whereIn('name',['Amr', 'Sara','Khaled']);  //ready method 


#rout prefix
// Route::prefix('cars')->group(function(){
//     Route::get('bmw', function(){
//     return 'category is: BMW ' ;
// });

// Route::get('mercedes', function(){
//     return 'category is: mercedes ';
// });
// });


#FALL BACK
// Route::fallback(function(){
    // return 'The required page is not found';
//     return redirect('/');
// });  


#
// Route::get('test', function (){
//     return view('test');
// }); 


#Make controller 
/* 
هو عقل الابليكشن ومسئول عن ربط كل الاجزاء الخاصه بالابليكشن وهو حلقة الوصل بين 
(ال route و ال view)*/
//php artisan make:controller MycontrController (command line)


