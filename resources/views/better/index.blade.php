@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Betters</div>

                <div class="card-body">
                    @foreach ($betters as $better)
                    {{$better->name}} {{$better->surname}}<br> 
                    <small>Bet on: {{$better->bettedHorse->name}}</small><br>
                    <a href="{{route('better.edit', [$better])}}">Edit</a> <br>
                    <form method="POST" action="{{route('better.destroy', [$better])}}">
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                    <br>


                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
