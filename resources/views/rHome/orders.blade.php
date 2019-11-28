@extends('nav')

@section('content')
    <h1 class="display-1">Your latest order :</h1>
    @if($food && auth()->user()->role == "Restaurant")
       
        <li class="list-group-item d-flex justify-content-between align-items-center">
        <h4 class="display-5"> {{$food->name}} ordered by {{$person->name}} for Rs. {{$food->price}}</h4> 
    @endif         
    
    @if($food && auth()->user()->role == "User")
    <li class="list-group-item d-flex justify-content-between align-items-center">
    <h4 class="display-5"> {{$food->name}} ordered from {{$person->name}} for Rs. {{$food->price}}</h4> 
    @endif
    @if(!$food)
        <h3>NO orders found</h3>
    @endif

@endsection