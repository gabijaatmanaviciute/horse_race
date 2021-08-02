@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Horses</div>

                <div class="card-body">
                    @foreach ($horses as $horse)
                    <big>{{$horse->name}}</big> <br>
                    <small>Runs/wins: ({{$horse->runs}}/{{$horse->wins}})</small> <br>
                    <a href="{{route('horse.edit',$horse)}}">Edit</a><br>
                    <form method="POST" action="{{route('horse.destroy', $horse)}}">
                        @csrf
                        <button type="submit">Delete</button>
                    </form>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
