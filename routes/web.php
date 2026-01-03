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


Route::get('/', function(){
    return view('welcome');
});
Route::get('/forum', [
    'uses' => 'ForumController@index',
    'as' => 'forum'

]);
Route::get('channel/{slug}',[


    'uses' => 'ForumController@channel',
    'as' => 'channel'
]);

Route::get('discusssion/show/{slug}',[
    'uses' => 'DiscussionController@show',
    'as' => 'discussion'
 ]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function(){


Route::resource('channels', 'ChannelsController');

Route::get('discussion/create', [
    'uses' => 'DiscussionController@create',
    'as' => 'discussion.create'
]);

Route::post('discussion/post',[
    'uses' =>  'DiscussionController@store',
    'as' => 'discussion.store'
]);




Route::post('discussion/reply/{id}',[
 'uses' => 'DiscussionController@reply',
 'as' => 'discussion.reply'
]);

Route::get('/reply/like/{id}',[
    'uses' => 'ReplyController@like',
    'as'=> 'reply.like'
]);


Route::get('/reply/unlike/{id}',[
    'uses' => 'ReplyController@unlike',
    'as'=> 'reply.unlike'
]);


Route::get('/reply/edit/{id}',[
    'uses' => 'ReplyController@edit',
    'as'=> 'reply.edit'
]);


Route::post('/reply/update/{id}',[
    'uses' => 'ReplyController@update',
    'as'=> 'reply.update'
]);

Route::get('/watch/{id}',[
    'uses' => 'WatchersController@watch',
    'as' => 'watch'
]);

Route::get('/unwatch/{id}',[
    'uses' => 'WatchersController@unwatch',
    'as' => 'unwatch'
]);

Route::get('discussion/bestreply/{id}',[
    'uses' => 'ReplyController@best_answer',
    'as'=>'discussion.best.reply'
]);

Route::get('discussion/edit/{slug}', [
    'uses' => 'DiscussionController@edit',
    'as'  => 'discussion.edit'
]);


Route::post('discussion/update/{id}', [
    'uses' =>'DiscussionController@update',
    'as' => 'discussion.update'
]);

});


