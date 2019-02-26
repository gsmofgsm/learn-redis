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

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    
    // this could be set by an artisan command everytime redis restarts

//    $user1Stats = [
//        'favorites' => 50,
//        'watchLaters' => 90,
//        'completions' => 25
//    ];
//
//    Redis::hmset('user.1.stats', $user1Stats);

    return Redis::hgetall('user.1.stats');
});

Route::get('user-favorites', function (){
    Redis::hincrby('user.1.stats', 'favorites', 1);
    return Redis::hget('user.1.stats', 'favorites');
});

Route::get('foo', function (){
    Cache::put('foo', 'bar', 20);
    return Cache::get('foo');
});


