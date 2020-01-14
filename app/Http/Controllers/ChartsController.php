<?php

namespace App\Http\Controllers;

use App\User;
use App\Word;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Charts\Test;

class ChartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function wordsToLearn()
    {
        $userWords = User::find(Auth::id())->words()->get();

        $knownWords = count($userWords);

        if ($knownWords != 0)
            return 4000-$knownWords;
        else
            return 4000;
    }

    public function charts()
    {
        $chart = new Test();

        $userWords = User::find(Auth::id())->words()->get();

        $nrKnownWords = count($userWords);

        $lastMonth = [];
        $lastMonthCarbon = [];

        for ($i=30; $i>=0; $i--)
        {
            array_push($lastMonth, Carbon::now()->subDays($i)->format('d.m'));
            array_push($lastMonthCarbon, Carbon::now()->subDays($i));
        }
        $a = [];
        $counter = 0;
        foreach ($lastMonthCarbon as $dayCarbon)
        {
            foreach ($userWords as $userWord) {
                if($dayCarbon->isSameDay($userWord->pivot->created_at)) {
                    $counter ++;
                }
            }
            array_push($a, $counter);
            $counter = 0;
        }

        $chart->labels($lastMonth);
        $chart->dataset('', 'line', $a)
        ->color('lightblue');
        $chart->title('Twoja aktywność w nauce w ostatnim miesiącu');
        $chart->displayLegend(false);

        $wordsToLearn = $this->wordsToLearn();

        return view('charts', compact('chart', 'wordsToLearn'));
    }
}













