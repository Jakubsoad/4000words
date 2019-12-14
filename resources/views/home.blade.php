@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center" style="margin-top: 100px">
                <form action="/newGame" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-success btn-lg btn-block" >Fiszki</button>
                </form>
    </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 text-center" style="margin-top: 30px">
                <form action="/start/hangman" method="get">
                @csrf
                <button type="submit" class="btn btn-outline-success btn-lg btn-block" >Wisielec</button>
                </form>
    </div>
    </div>
</div>

@endsection
