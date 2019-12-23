@extends('nav')

@section('content')
    <h1>Restaurants that have {{$fItem->name}} :</h1>
    <ul class = "list-group">
            @foreach($rname as $rn)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h4 class="display-5"> {{$rn->name}}
                    </h4> 
                    {!!Form::open(['action'=>'orderController@store', 'method'=>'POST'])!!}
                    <div class="col-sm-10">
                        {{Form::hidden('R_id', $rn->id )}}
                        {{Form::hidden('F_id', $fItem->id)}}
                        {{Form::hidden('U_id', auth()->user()->id)}}
                        @if(auth()->user()->role == "User")
                        {{Form::submit('Order',['class'=>'btn btn-primary btn-lg'])}}
                        @else
                        <a href ="/login" class="btn btn-primary btn-lg">Order</a>
                        @endif  
                    {!!Form::close()!!}
                </li>
            @endforeach
        </ul>
@endsection