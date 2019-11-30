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
        $words = $this->getWordsCsv(storage_path('app/4000.csv'));

        foreach ($words as $word) {
            $name = $word[0];
            $translation = $word[1];
            $record = new \App\Word();
            $record->name = $name;
            $record->translation = $translation;
            $record->save();
        }
    }

    public function getWordsCsv($path) : array
    {
        $words = [];

        $row = 1;
        if (($handle = fopen($path, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
                array_push($words, $data);
                $num = count($data);
                $row++;
                for ($c=0; $c < $num; $c++) {
                    $data[$c];
                }
            }
            fclose($handle);
        }
        return $words;

    }

    public function runFewRandomWords()
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
