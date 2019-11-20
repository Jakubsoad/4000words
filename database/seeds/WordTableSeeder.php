<?php

use Illuminate\Database\Seeder;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $word = new \App\Word();
        $word->name = 'artisan';
        $word->translation = 'rzemieślnik';
        $word->part_of_speech = 'noun';
        $word->save();

        $word = new \App\Word();
        $word->name = 'green';
        $word->translation = 'zielony';
        $word->part_of_speech = 'adjective';
        $word->save();

        $word = new \App\Word();
        $word->name = 'big';
        $word->translation = 'duży';
        $word->part_of_speech = 'adjective';
        $word->save();

        $word = new \App\Word();
        $word->name = 'fan';
        $word->translation = 'wentylator';
        $word->part_of_speech = 'noun';
        $word->save();

        $word = new \App\Word();
        $word->name = 'eat';
        $word->translation = 'jeść';
        $word->part_of_speech = 'verb';
        $word->save();
    }
}
