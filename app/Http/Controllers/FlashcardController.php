<?php

namespace App\Http\Controllers;

use App\Game;
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

        $game = User::find(Auth::id())->games()->orderBy('id', 'desc')->first();

        if($words->count() > 3) {
            $words = $words->random(4)->shuffle();
        } else {
            return view('winner');
        }

        $wordOfGame = $words->first();
        $words = $words->shuffle();

        return view('flashcard', [
            'wordOfGame' => $wordOfGame,
            'words' => $words,
            'game' => $game
        ]);
    }

    public function check(Request $request)
    {
        $properId = $request->properId;
        $selectedId = $request->selectedId;

        $words = Word::all();

        $game = User::find(Auth::id())->games()->orderBy('id', 'desc')->first();

        if($properId == $selectedId)
        {
            //dodaj do relacji
            DB::table('user_word')->insert([
                'user_id' => Auth::id(),
                'word_id' => $properId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $game->proper_answers = $game->proper_answers + 1;
        }
        $game->nr_answers = $game->nr_answers += 1;
        $game->save();
        if ($game->proper_answers >= 20)
        {
            return view('dailyWinner', ['game' => $game]);
        }


        return view('result', [
            'properId' => $properId,
            'selectedId' => $selectedId,
            'words' => $words
        ]);
    }
}
