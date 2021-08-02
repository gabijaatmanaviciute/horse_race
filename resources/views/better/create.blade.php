@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Better</div>

                <div class="card-body">
                    <form method="POST" action="{{route('better.store')}}">
                        <div class="form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" name="better_name">
                            <small class="form-text text-muted">Insert better's name.</small>
                        </div>

                        <div class="form-group">
                            <label>Surname:</label>
                            <input type="text" class="form-control" name="better_surname">
                            <small class="form-text text-muted">Insert better's surname.</small>
                        </div>

                        <div class="form-group">
                            <label>Bet:</label>
                            <input type="text" class="form-control" name="better_bet">
                            <small class="form-text text-muted">Insert betted sum.</small>
                        </div>

                        <div class="form-group">
                            <select name="horse_id">
                                @foreach ($horses as $horse)
                                <option value="{{$horse->id}}" class=" form-control">{{$horse->name}}</option>
                                @endforeach
                            </select>

                            <small class="form-text text-muted">Select the horse to bet on.</small>
                        </div>

                        @csrf
                        <button type="submit">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title') Horse Race @endsection
