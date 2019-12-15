@extends('layouts.app')

@section('head')
    <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <script>
        var word = {word: "{{$word->name}}", translation: "{{$word->translation}}"};
    </script>
    <script src="{{asset('js/szubienica.js')}}"></script>

    <style>
        body {
        background-color: white !important;
        }
        main, .py-4 {
            padding-top: 0rem !important;
        }
    </style>
@endsection

@section('content')
    <div id="pojemnik">
        <div id="plansza" ></div>
        <div id="szubienica">
            <img src="{{asset('img/s0.jpg')}}" alt="" />
        </div>
        <div id="alfabet"></div>
        <div style="clear:both;"></div>
    </div>

@endsection
