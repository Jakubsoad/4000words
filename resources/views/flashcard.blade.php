@extends('layouts.app')

@section('content')
<div class="row justify-content-center"><div class="col-md-4 text-center">{{ $game->proper_answers}}/{{ $game->nr_answers }} </div></div>
<div class="container" style="margin-top: 60px; margin-bottom: 50px">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
        <h2>{{ lcfirst($wordOfGame->name) }}</h2>
        </div>
    </div>
</div>

{{--    TODO:Ogarnąć wyswietlanie w duzym i malym formacie--}}


<div class="container">
    <div class="row justify-content-center">
        <form method="post">
            @csrf
        @foreach($words as $word)
            <button class="btn btn-outline-info m-4" type="submit" style="margin: 0px !important; margin-bottom: 30px !important;" name="selectedId" value="{{$word->id}}">
            {{lcfirst($word->translation)}}
            <input type="hidden" name="properId" value="{{$wordOfGame->id}}">
            </button>
       @endforeach
        </form>
    </div>
</div>
@endsection
