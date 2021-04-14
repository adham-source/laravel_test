<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('home/{id?}', function ($id = NULL) {
//    // return view('index');
//   // echo 'Direct auto';
//   $id = md5($id);
//   echo 'My id is : ' . $id;
// });

// Route::get('displayBlog', 'blogController@blogInfo');

// Route::get('showData', function () {
//     return view('register');
// });

# Print title page by url /registerTitle
Route::get('register', 'registerController@registerTitle');

# Show data after register
Route::post('profile', 'registerController@showData');

Route::resource('user', 'userController');



# Start Route members 
Route::resource('member', 'memberController');

# Start login Route
# Get url login and print title
Route::get('login', 'memberController@login') -> name('login');
# Logic method login
Route::post('doLogin', 'memberController@logicLogin');

