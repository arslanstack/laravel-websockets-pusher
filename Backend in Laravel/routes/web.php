<?php

use App\Events\UserLiked;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::post('like', function (){
    $liker_name = request()->user_name;
    $post_name = request()->post_name;
    event(new UserLiked($liker_name, $post_name));
    return response()->json(['status' => 'success']);
});
