<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Auth;
use Session;
class ReplyController extends Controller
{
   public function like($id){
   $reply = Reply::find($id);

   Like::create([
       'reply_id' => $id,
       'user_id' =>Auth::id()

   ]);




   Session::flash('success','you liked this reply');
   return redirect()->back();
}

//
public function unlike($id){
$like = Like::where('reply_id',$id)->where('user_id', Auth::id())->first();
$like->delete();

Session::flash('success','you unliked this reply');
   return redirect()->back();
}



public function best_answer($id){
    $reply =Reply::find($id);

    // dd($reply);
    $reply->best_reply = 1;
    $reply->save();

    $reply->user->points += 40;
    $reply->user->save();
    Session::flash('success','reply as been marked as best answer');
     return redirect()->back();

}

public function edit($id){
    return view('reply.edit',['r' => Reply::find($id)]);
}


public function update($id){
    $this->validate(request(),[
        'content'=>'required',
    ]);

    $r = Reply::find($id);
    $r->content = request()->content;
    $r->save();
    Session::flash('success','reply as been updated');
    return redirect()->route('discussion' , ['slug' => $r->discussion->slug]);
}

}
