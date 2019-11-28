@extends('nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
                @if(auth()->user()->role == "Restaurant")
                <a href="menuItems/create" class="btn btn-primary">Create menu Item</a>
                @endif
                <a href="order" class="btn btn-success">Your last order</a>
            </div>
        </div>
    </div>
</div>
@endsection
