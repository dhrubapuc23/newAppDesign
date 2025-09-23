<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard/{id}/{name?}', function (string $id, string $name=null) {
    //return 'This is the dashboard for user with ID: ' . $id;
    return view('dashboard',['id'=>$id, 'name'=>$name]);
});

// Route::view('/dashboard','dashboard');

Route::get('/greeting',[UserController::class,'index']);

Route::get('/a/b/c/d', function () {
    return 'Named Routing Example';
})->name('snd');

Route::prefix('blog')->group(function () {
        Route::get('/view', function () {
        return 'This is the blog view page';
    });
    Route::get('/create', function () {
        return 'This is the blog create page';
    });
    Route::get('/update', function () {
        return 'This is the blog update page';
    });
    Route::get('/delete', function () {
        return 'This is the blog delete page';
    });
});

Route::view('/admin/home','admin.home');
Route::view('/admin/feature1','admin.feature1');
Route::resource('photo', PhotoController::class);

Route::get('student',[StudentController::class, 'create'])->name('student.create');
Route::post('student/store',[StudentController::class, 'store'])->name('student.store');
Route::get('student/show',[StudentController::class, 'showData'])->name('student.show')->middleware('auth');
Route::get('student/course',[StudentController::class, 'getCourse'])->name('student.course');
Route::get('student/edit/{id}',[StudentController::class, 'edit'])->name('student.edit');
Route::post('student/update/{id}',[StudentController::class, 'update'])->name('student.update');
Route::get('student/delete/{id}',[StudentController::class, 'delete'])->name('student.delete');
Route::post('student/search',[StudentController::class, 'search'])->name('student.search');
Route::get('file/upload',[StudentController::class, 'fileUploadForm'])->name('file.upload.form');
Route::post('file/upload',[StudentController::class, 'fileUploadSubmit'])->name('file.upload.submit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get-pdf',[StudentController::class, 'getPDF'])->name('get.pdf');
