<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Watcher;
class WatchersController extends Controller
{
 public function watch($id){
  Watcher::create([
      'user_id'=> Auth::id(),
      'discussion_id' => $id
  ]);

  Session::flash('success','Discussion added successfully');

  return redirect()->back();


 }


 public function unwatch($id){
     $unwatch =  Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
     $unwatch->delete();
     Session::flash('success','You are no longer watching this discussion');

  return redirect()->back();
 }
}
