<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('userinfo', function(){
//     return ['name'=>'abc', 'email'=>'abc@gmail.com'];
// });

Route::post('userinfo', function(Request $request){
    return $request->input();
});

Route::get('studentlistapi', [StudentController::class, 'showDataApi']);
