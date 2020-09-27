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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/posts', 'PagesController@posts');
Route::get('/posts/{post}', 'PagesController@post');
// Route::post('/posts/store', 'PagesController@store');
Route::post('/posts/{post}/store', 'CommentController@store');
Route::get('/category/{name}', 'PagesController@category');

// auth

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');


// login

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

//acces
Route::get('/access-denied', 'PagesController@accessDenied');



// test

//صلاحيات الادمن
Route::group(['middleware' => 'roles',"roles" => ['admin']], function () {

    Route::get('/admin', 'PagesController@admin');
    Route::post('/add-role', 'PagesController@addRole');

});

Route::group(['middleware' => 'roles',"roles" => ['Editor','Admin']], function () {

    Route::get('/editor', 'PagesController@editor');
    Route::post('/posts/store', 'PagesController@store');


});

Route::group(['middleware' => 'roles',"roles" => ['User','Editor','Admin']], function () {
    Route::get('/like', 'PagesController@like')->name('like');


});

// Route::get('/admin',[
//     'uses'        =>'PagesController@admin',
//     'as'          => 'content.admin',
//     'middleware'  =>'roles',
//     'roles'       => ['admin']
// ]);


// Route::post('/add-role',[
//     'uses' =>'PagesController@addRole',
//     'as' => 'content.admin',
//     'middleware' =>'roles',
//     'roles' => ['admin']
// ]);


// Route::get('/editor',[
//     'uses' =>'PagesController@editor',
//     'as' => 'content.editor',
//     'middleware' =>'roles',
//     'roles' => ['admin','editor']
// ]);








