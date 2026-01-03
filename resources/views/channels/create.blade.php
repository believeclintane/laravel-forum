@extends('layouts.app')

@section('content')
 
            <div class="card">
                <div class="card-header">create new channel</div>

                <div class="card-body">
                    <form method="POST" action="{{route('channels.store')}}">
{{csrf_field()}}
   <div class="form-group">
       <input type="text" name="channel" class="form-control">
   </div>   

   <div class="form-group text-center">
       <button class="btn-success btn" type="submit">
           save
       </button>
   </div>   
</form>           
                </div>
            </div>
       
@endsection
