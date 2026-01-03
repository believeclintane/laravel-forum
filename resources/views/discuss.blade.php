@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header center">Dashboard</div>

                <div class="card-body">
                   <form method="post" action="{{route('discussion.store')}}">

{{csrf_field()}}
<div class="form-group">
    <label for="title"> discussion title</label>
    <input type="text" id="title" value="{{old('title')}}" name="title" class="form-control">
</div>
  <div class="form-group">

      <label for="ch">pick a channel</label>
      <select name="channel_id" id="ch" class="form-control">
           @foreach ($channels as $channel )
               <option value="{{$channel->id}}"  class="form-control"> {{$channel->title}} </option>
           @endforeach
      </select>
      <div class="form-group">
          <label for="content"> Ask a Question</label>
          <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-success">
              submit
          </button>
      </div>
  </div>
                   </form>
                </div>
            </div>

@endsection
