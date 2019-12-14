@extends('layouts.app')

@section('head')
    <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <script src="{{asset('js/szubienica.js')}}"></script>

@endsection

@section('content')

    <div id="pojemnik">
        <div id="plansza"></div>
        <div id="szubienica">
            <img src="{{asset('img/s0.jpg')}}" alt="" />
        </div>
        <div id="alfabet"></div>
        <div style="clear:both;"></div>
    </div>

@endsection
