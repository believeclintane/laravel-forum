@extends('layouts.app')

@section('content')
@foreach ($ds as $d)
<div class="card mb-2">
    <div class="card-header">
        <img src="{{$d->user->avatar}}" height='40px' width="40px" alt="">
        <span> {{$d->user->name}} <b> {{$d->created_at->diffForHumans() }}  </b></span>
        <span><a href="{{route('discussion',['slug' => $d->slug])}}" class="btn btn-secondary float-right ">veiw</a></span>


        @if($d->hasBestAnswer())
        <span class="badge badge-info">CLOSED</span>
        @endif
    </div>

    <div class="card-body">
        <h5>{{$d->title}}</h5>
      <p>  {{str_limit($d->content,60)}}</p>
    </div>
    <div class="card-footer">
        <span>
            {{$d->reply->count()}} Replies
        </span>
       <a href=" {{route('channel',['slug' => $d->channel->slug])}} " class="btn btn-success float-right btn-xs"> {{$d->channel->title}} </a>
    </div>
 </div>

@endforeach
<div class="text-center">
    {{$ds->links()}}
</div>


@endsection
