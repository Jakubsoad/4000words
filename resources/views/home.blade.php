@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center" style="margin-top: 100px">
                <form action="/start" method="get">
                <button type="submit" class="btn btn-outline-success btn-lg" >Start</button>
                </form>
    </div>
    </div>
</div>

@endsection
