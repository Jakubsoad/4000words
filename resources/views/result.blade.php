@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            @if($properId == $selectedId)
            <h2>    Tak jest,
            <i>{{ $words->find($properId)->name }}</i>
                oznacza to samo, co
            <i>{{ $words->find($selectedId)->translation }}</i>.
            </h2> <br>
                <h3 style="color: #1d643b">Gratulacje, punkt dla ciebie!</h3>
            @else
                    <h2>    Niestety,
                        <i>{{ $words->find($properId)->name }}</i>
                        znaczy coś innego, niż
                        <i>{{ $words->find($selectedId)->translation }}</i> <br> </h2>

                <h3>Właściwa odpowiedź to <i>{{ $words->find($properId)->translation }}</i></h3>
                     <br>
                    <h3 style="color: #761b18">Próbuj dalej!</h3>
            @endif
        </div>
    </div>
    <div class="row justify-content-center m-4">
        <form method="get" action="/start/flashcard">
    <button class="btn btn-outline-info" type="submit">Następny</button>
        </form>
    </div>
</div>
@endsection
