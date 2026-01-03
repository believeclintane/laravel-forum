@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                     <table class="table table-responsive table-hover">
<thead>
    <th>
        name
    </th>
    <th>
        edit
    </th>
    <th>delete</th>
</thead>
<tbody>
    @foreach ($channels as $channel)
        <tr>
            <td>{{$channel->title }}</td>
            <td>
                 <a href="{{route('channels.edit',['channel' => $channel->id])}}" class="btn btn-xs btn-warning"> Edit</a>
            </td>
            <td>
                                          <form action="{{route('channels.destroy',['channel' => $channel->id])}}" method="post">
                                        {{ csrf_field() }} 

                                        {{method_field('DELETE')}}
                                        <button  type="submit" class="btn btn-xs btn-danger"> Delete</button>
                                        </form>
                                        
                                    </td>
        </tr>
        
    @endforeach
</tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
