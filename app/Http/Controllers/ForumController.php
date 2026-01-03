<?php

namespace App\Http\Controllers;
use Auth;
use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Discussion;
class ForumController extends Controller
{
    public function index(){
        // $des =  Discussion::orderBy('created_at','desc')->paginate(2);
        switch(request('filter')){
            case 'me':
                $results = Discussion::where('user_id',Auth::id())->paginate(2);
                break;

            case 'solved':
                  $answer =  array();
                  foreach(Discussion::all() as $d){
                      if($d->hasBestAnswer()){
                          array_push($answer,$d);
                      }
                  }

 $results = new Paginator($answer, 3);

                break;

                case 'unsolved':
                    $unanswer =  array();
                    foreach(Discussion::all() as $d){
                        if(!$d->hasBestAnswer()){
                            array_push($unanswer,$d);
                        }
                    }

   $results = new Paginator($unanswer, 3);

                  break;


                default:
              $results =  Discussion::orderBy('created_at','desc')->paginate(2);
                break;
        }


       return view('forum',['ds' => $results]);
    }

    public function channel($slug){
        $channel = Channel::where('slug',$slug)->first();

        return view('channel',['ds' => $channel->discussion()->paginate(5)]);

    }
}
