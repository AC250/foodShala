@extends('nav')

@section('content')
    <h1 class="display-3"> create new menu item</h1>
    
        <h3 class = "display-6">add a new item :</h3>
        {!!Form::open(['action'=>'menuController@store', 'method'=>'POST'])!!}
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label"><h5>Item name</h5></label>
            <div class="col-sm-10">
              {{Form::text('name', '', ['class'=>"form-control"])}}
            </div>
          
            <label for="inputText" class="col-sm-2 col-form-label"><h5>Item Type</h5></label>
            <div class="col-sm-10">
                {{Form::select('type', ['v'=>'Veg', 'n'=>'Non-Veg'],['class'=>"form-control"])}}
            </div>
          <label for="inputText" class="col-sm-2 col-form-label"><h5>Item Price</h5></label>
            <div class="col-sm-10">
              {{Form::text('price', '', ['class'=>"form-control", 'id'=>"inputText"])}}
            </div>
        </div>
        {{Form::submit('Add',['class'=>'btn btn-primary btn-lg'])}}
        {!!Form::close()!!}
        
@endsection