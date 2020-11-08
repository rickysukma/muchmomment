<?php

// Route::get('/', function () {
//     return view('frontend.layout');
// });

Route::get('/','HomeController@test');

Auth::routes();

Route::get('/test', 'HomeController@test');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/send-email', 'HomeController@send_email')->name('home.send-email');
Route::get('/photo/{cat}/{slug?}', 'HomeController@photo')->name('photo');
Route::get('/photo-of/{slug}', 'HomeController@photo_slug')->name('photo.slug');
Route::get('/videos/{name}', 'HomeController@videos')->name('videos');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

//==== Admin routes =====
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
  Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
  
  Route::get('/setting', 'AdminController@setting')->name('admin.setting');
  Route::post('/setting-save', 'AdminController@setting_save')->name('admin.setting-save');
  
  Route::get('/post/list-video', 'AdminController@videos')->name('admin.videos');
  Route::get('/post/list-photo', 'AdminController@photos')->name('admin.photos');
  // album
  Route::get('/post/album/{id}', 'AdminController@album')->name('admin.album');
  Route::post('/post/album-upload/{id}', 'AdminController@album_upload')->name('admin.album-upload');
  Route::post('/post/album-hapus', 'AdminController@album_hapus')->name('admin.album-hapus');
  //post
  Route::get('/post/create', 'AdminController@post_create')->name('admin.post/create');
  Route::get('/post/create-video', 'AdminController@post_create_video')->name('admin.post/create-video');
  Route::post('/post/store', 'AdminController@post_store')->name('admin.post/store');
  Route::post('/post/store-video', 'AdminController@post_store_video')->name('admin.post/store-video');

  Route::get('/post/edit/{id}', 'AdminController@post_edit')->name('admin.post/edit-photo');
  Route::get('/post/edit-video/{id}', 'AdminController@post_edit_video')->name('admin.post/edit-video');
  
  Route::post('/post/update/{id}', 'AdminController@post_update')->name('admin.post/update');
  Route::post('/post/update-video/{id}', 'AdminController@post_update_video')->name('admin.post/update-video');
  
  Route::get('/post/trash/{id}', 'AdminController@post_trash')->name('admin.post/trash');
  Route::get('/post/trashed/', 'AdminController@post_trashed')->name('admin.post/trashed');
  Route::get('/post/restore/{id}', 'AdminController@post_restore')->name('admin.post/restore');
  Route::get('/post/forcedelete/{id}', 'AdminController@post_forcedelete')->name('admin.post/forcedelete');
  //category
  Route::get('/category', 'CategoryController@category')->name('admin.category');
  Route::get('/category/create', 'CategoryController@category_create')->name('admin.category/create');
  Route::post('/category/store', 'CategoryController@category_store')->name('admin.category/store');
  Route::get('/category/edit/{id}', 'CategoryController@category_edit')->name('admin.category/edit');
  Route::post('/category/update/{id}', 'CategoryController@category_update')->name('admin.category/update');
  Route::get('/category/delete/{id}', 'CategoryController@category_delete')->name('admin.category/delete');
  //tag
  Route::get('/tag', 'AdminController@tag')->name('admin.tag');
  Route::get('/tag/create', 'AdminController@tag_create')->name('admin.tag/create');
  Route::post('/tag/store', 'AdminController@tag_store')->name('admin.tag/store');
  Route::get('/tag/edit/{id}', 'AdminController@tag_edit')->name('admin.tag/edit');
  Route::post('/tag/update/{id}', 'AdminController@tag_update')->name('admin.tag/update');
  Route::get('/tag/delete/{id}', 'AdminController@tag_delete')->name('admin.tag/delete');
});


//==== Post routes ====


//==== User routes ====
