<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get(md5('/all-contact'),'ContactController@AllContact')->name('all.contacts');

Route::get('/insert-data','ContactController@InsertData');


Route::post('/data-added','ContactController@DataAdded');

Route::get('/delete-contact/{id}','ContactController@DeleteContact');
Route::get('/edit-contact/{id}','ContactController@EditContact');

Route::post('/update-contact/{id}','ContactController@UpdateContact');
Route::get('/view-contact/{id}','ContactController@ViewContact');