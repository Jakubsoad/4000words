<?php

namespace App\Http\Controllers;

use App\User;
use App\Word;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function foo\func;

class FlashcardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $words = new WordController();
        $words = $words->unknownWords(Auth::id());


        if($words->count() > 4) {
            $words = $words->random(4)->shuffle();
        } else {
            return view('winner');
            //TODO: zrobić widok winner
        }

        $wordOfGame = $words->first();

        return view('flashcard', [
            'wordOfGame' => $wordOfGame,
            'words' => $words
        ]);
    }

    public function check(Request $request)
    {
        $properId = $request->properId;
        $selectedId = $request->selectedId;

        if($properId == $selectedId)
        {
            //dodaj do relacji
            DB::table('user_word')->insert([
                'user_id' => Auth::id(),
                'word_id' => $properId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        $words = new WordController();
        $words = $words->unknownWords(Auth::id());

        return view('result', [
            'properId' => $properId,
            'selectedId' => $selectedId,
            'words' => $words
        ]);
    }
}
