<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HangmanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $word = new WordController();
        $word = $word->unknownWords(Auth::id())->random(1)->first();

        //usunięcie wartości w nawiasach, jeżeli występują
        if(strpos($word->name, '(') !== false)
        {
            $word->name = substr($word->name, 0, strpos($word->name, '('));
        }

        return view('hangman', compact('word'));
    }
}
