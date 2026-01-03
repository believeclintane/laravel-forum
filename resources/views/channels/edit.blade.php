@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header"> Edit channel {{ $channel->title}}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('channels.update',['channel' =>$channel->id])}}">
{{csrf_field()}}
 

   <div class="form-group">
       <input type="text" name="channel" class="form-control" placeholder="{{$channel->title}}">
   </div>

   <div class="form-group text-center">
       <button class="btn-success btn" type="submit">
          update
       </button>
   </div>

   </form>
                </div>
            </div>

@endsection
