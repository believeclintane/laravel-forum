<?php

namespace App\Http\Controllers;
use App\Reply;
use Illuminate\Http\Request;
use App\Discussion;
use App\User;
use Auth;
use  Notification;
use Session;
class DiscussionController extends Controller
{
    public function create(){
        return view('discuss');
    }

    public function store( Request $request){
  $this->validate($request,[
      'channel_id' => 'required',
      'content' => 'required',
      'title' => 'required'
  ]);

  $discussion =  Discussion::create([
    'title' => $request->title,
    'channel_id' => $request->channel_id,
    'content' => $request->content,
    'user_id' => Auth::id(),
    'slug' => str_slug($request->title),
  ]);

  Session::flash('success','Discussion added successfully');

        return redirect()->route('discussion' , ['slug' => $discussion->slug]);
}


public function show($slug){



    $discussion = Discussion::where('slug',$slug)->first();

  $best_reply = $discussion->reply()->where('best_reply',1)->first();

    return view('discussion.show')->with('d', $discussion)->with('best_reply',$best_reply);
}





public function reply(Request $request,$id){
  $d = Discussion::find($id);



   $reply = Reply::create([
  'user_id' =>Auth::id(),
  'discussion_id' => $id,
  'content' => $request->reply,
   ]);

   $reply->user->points += 20;
//    dd($reply->user->points);
   $reply->user->save();


   $watchers = array();

   foreach($d->watch  as $w){
       array_push($watchers, User::find($w->user_id));
   }
//  dd($watchers);

Notification::send($watchers, new \App\Notifications\newReplyAdded($d));


   Session::flash('success','Discussion added successfully');

   return redirect()->back();
}



public function edit($slug){

    return view('discussion.edit',['d'  => Discussion::where('slug',$slug)->first()]);
}


public function update($id){
   $this->validate(request(),[
       'content'=> 'required'
   ]);

   $d = Discussion::find($id);
   $d->content = request()->content;

    
   $d->save();

   Session::flash('success','Discussion updated successfully');

   return redirect()->route('discussion',['slug' =>$d->slug]);
}
}
