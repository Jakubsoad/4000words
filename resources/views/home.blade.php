@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/start" method="get">
                <button type="submit" class="btn btn-success">Start</button>
                </form>
        </div>
    </div>
</div>
@endsection
