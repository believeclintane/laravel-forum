<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title','channel_id','user_id','content','slug'];

    public  function channel(){
        return $this->belongsTo('App\Channel');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function reply(){
     return   $this->hasMany('App\Reply');
    }

    public function watch(){
        return $this->hasMany('App\Watcher');
    }
    public function  id_being_watch_by_auth_user(){
      $id = Auth::id();
      $watchers_id = array();


    foreach($this->watch as $w){
        array_push($watchers_id, $w->user_id);

    }

    if(in_array($id,$watchers_id)){
        return true;
    }else{
        return false;
    }
    }


public function hasBestAnswer(){
     $result = false;
    foreach($this->reply as $r):
          if($r->best_reply)
           {
$result = true;
break;
           }


    endforeach;


    return $result;
}

}
