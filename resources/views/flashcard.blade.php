@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
        <h2>{{ $wordOfGame->name }}</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <form method="post">
            @csrf
        @foreach($words as $word)
        <button class="btn btn-outline-info m-4" type="submit" name="selectedId" value="{{$word->id}}">
        {{$word->translation}}
        <input type="hidden" name="properId" value="{{$wordOfGame->id}}">
        </button>
    @endforeach
        </form>
    </div>
</div>
@endsection
