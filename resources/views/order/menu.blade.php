@extends('nav')
@section('content')
    <h1 class="display-3">Menu</h1>
    @if(count($items)>0)
        <ul class = "list-group">
            @foreach($items as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h4 class="display-5"> {{$item->name}}
                    <small class="text-muted"><sub>{{$item->type}}</sub></small>
                    </h4> 
                    <a href = "/menuItems/{{$item->id}}" class = "btn btn-primary">{{$item->price}}</a>    
                </li>
            @endforeach
        </ul>
        {{$items->links()}};
    @else
        <h3>NO items found</h3>
    @endif
    
@endsection