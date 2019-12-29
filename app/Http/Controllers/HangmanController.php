<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function saveToKnown(Request $request)
    {
        DB::table('user_word')->insert([
            'user_id' => Auth::id(),
            'word_id' => $request->wordId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/start/hangman');
    }
}









