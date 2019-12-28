@extends('layouts.app')

@section('head')

    <style>
        body {
            background-color: white !important;
        }
    </style>

@endsection

@section('content')
    <div style="margin: 10px;">
        {{ $chart->container() }}
        {{ $chart->script() }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection













