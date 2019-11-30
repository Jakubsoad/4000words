@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 style="color: #1d643b">Brawo!!!</h1>
            <h1>Spełniłeś swój codzienny obowiązek:)</h1>
            <h3>Twój wynik to {{ $game->proper_answers}}/{{ $game->nr_answers }} </h3>
        </div>
    </div>
    <div class="row justify-content-center">
            <div class="col-md-4 text-center" style="margin-top: 20px">
                <form action="/newGame" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-success btn-lg btn-block" >Jeszcze raz?</button>
                </form>
            </div>
    </div>
</div>
@endsection
