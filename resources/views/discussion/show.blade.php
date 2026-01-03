@extends('layouts.app')

@section('content')

<div class="card mb-2">
    <div class="card-header">
        <img src="{{$d->user->avatar}}" height='40px' width="40px" alt="">
        <span>{{$d->user->name}} ({{$d->user->points}} points)</span>


        @if($d->hasBestAnswer())
        <span class="badge badge-info">CLOSED</span>
        @endif

        @if(Auth::id() == $d->user->id)
        @if (!$d->hasBestAnswer())
        <span class="float-right"><a class="btn btn-xs btn-warning  ml-2" href="{{route('discussion.edit',['slug'=> $d->slug])}}">Edit</a></span>

        @endif


          @endif


        @if($d->id_being_watch_by_auth_user())
        <span class="float-right"><a class="btn btn-xs btn-primary" href="{{route('unwatch',['id'=> $d->id])}}">unwatch</a></span>
        @else
        <span class="float-right"><a class="btn btn-xs  btn-primary" href="{{route('watch',['id'=> $d->id])}}">watch</a></span>
        @endif
    </div>

    <div class="card-body">
        <h5>{{$d->title}}</h5>
      <p>  {{ $d->content }}</p>
    </div>
    <div class="card-footer">
        {{$d->reply->count()}} Replies
    </div>
 </div>



 @if($best_reply)
 <div class="card text-center ">
     <h3>best answer</h3>
     <div class="card-header bg-info">
         <img src="{{$best_reply->user->avatar}}" height='40px' width="40px" alt="">
         <span>{{$best_reply->user->name}} ({{$best_reply->user->points}} points) </span>

     </div>

     <div class="card-body">
         {{$best_reply->content}}
     </div>
 </div>

 @endif


           @foreach ($d->reply as $r )


           <div class="card">
            <div class="card-header">



                <img src="{{asset($r->user->avatar)}}" alt="" width="70px" height="70px" >
                <span>{{$r->user->name}}</span>, <b>({{$r->user->points}} points)</b>
@if(!$best_reply)
@if(Auth::id() == $d->user->id)
<span><a href="{{route('discussion.best.reply',['id' =>$r->id])}}" class="btn btn-info btn-xs float-right ml-4">Mark as best reply</a></span>
@endif




@endif


@if (Auth::id() == $r->user->id)
@if (!$r->best_reply)
<span><a href="{{route('reply.edit',['id' =>$r->id])}}" class="btn btn-info btn-xs float-right">edit</a></span>
@endif

@endif


            </div>
            <div class="card-body">

                <p class="text-center">
                      {{ $r->content }}
                </p>

            </div>

            <div class="card-footer">
                @if ($r->is_liked_by_auth_user())
                       <a href="{{route('reply.unlike',['id' => $r->id])}}" class="btn btn-danger btn-xs">unlike  <span class="badge">{{$r->likes->count()}}</span></a>
                       @else
                            <a href="{{route('reply.like',['id' => $r->id])}}" class="btn btn-success btn-xs">like <span class="badge">{{$r->likes->count()}}</span></a>
                       @endif
            </div>
           </div>

           @endforeach


           @if(Auth::Check())
           <div class="card">
            <div class="card-header">
                <h5>Add Reply</h5>
            </div>
            <div class="card-body">
                <form action="{{route('discussion.reply',['id' => $d->id])}}" method="POST">
                    {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="reply" id=""  class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">submit</button>
                </div>

                </form>
            </div>
        </div>

        @else
        <a href="/login" class="text-center m-2">create an account in other to comment </a>

        @endif
@endsection
