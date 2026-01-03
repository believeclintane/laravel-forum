@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header center">Update  reply</div>

                <div class="card-body">
                   <form method="post" action="{{route('reply.update',['id'=> $r->id])}}">

{{csrf_field()}}

      <div class="form-group">
          <label for="content"> edit reply</label>
          <textarea class="form-control" name="content" id="content" cols="30" rows="10"> {{$r->content}} </textarea>
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
