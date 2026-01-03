@extends('layouts.app')

@section('content')
@foreach ($ds as $d)
<div class="card mb-2">
    <div class="card-header">
        <img src="{{$d->user->avatar}}" height='40px' width="40px" alt="">
        <span>{{$d->user->name}} {{$d->created_at->diffForHumans() }}</span>

        @if($d->hasBestAnswer())
        <span class="badge badge-info">CLOSED</span>
        @endif
        <span><a href="{{route('discussion',['slug' => $d->slug])}}" class="btn btn-secondary float-right ">veiw</a></span>
    </div>

    <div class="card-body">
        <h5>{{$d->title}}</h5>
      <p>  {{str_limit($d->content,60)}}</p>
    </div>
    <div class="card-footer">
        {{$d->reply->count()}} Replies
    </div>
 </div>

@endforeach
<div class="text-center">
    {{$ds->links()}}
</div>


@endsection
