<?php

namespace Database\Seeders\Topics;

use Illuminate\Database\Seeder;
use App\Models\QuizTopic;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class MoviesSeeder extends Seeder
{
    public function run(): void
    
    {

$quizData = [
     'Filmas' => [
        [
            'question' => 'Kurš režisēja filmu “Titāniks”?',
            'answers' => ['Džeimss Kamerons', 'Stīvens Spīlbergs', 'Ridlijs Skots', 'Kristofers Nolans', 'Kvintins Tarantino'],
            'correct' => 0
        ],
        [
            'question' => 'Kā sauc galveno varoni filmā “Matrikss”?',
            'answers' => ['Neo', 'Morfejs', 'Trinītija', 'Sīfars', 'Smit'],
            'correct' => 0
        ],
        [
            'question' => 'Kura studija radīja filmu “Lauvas karalis”?',
            'answers' => ['Disney', 'Pixar', 'DreamWorks', 'Warner Bros', 'Paramount'],
            'correct' => 0
        ],
        [
            'question' => 'Kurā gadā iznāca pirmā “Harijs Poters” filma?',
            'answers' => ['2001', '1999', '2003', '2005', '2007'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir galvenais varonis filmā “Dzelzs vīrs”?',
            'answers' => ['Tonijs Stārks', 'Stīvs Rodžers', 'Brūss Veins', 'Pīters Pārkers', 'Klārks Kents'],
            'correct' => 0
        ],
        [
            'question' => 'Kāda ir Džeimsa Bonda slavenā frāze?',
            'answers' => ['The name’s Bond, James Bond.', 'I’ll be back.', 'Hasta la vista, baby.', 'Why so serious?', 'Say hello to my little friend.'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir Marvel studijas konkurents?',
            'answers' => ['DC', 'Netflix', 'Sony', 'Universal', 'Warner'],
            'correct' => 0
        ],
        [
            'question' => 'Kurš aktieris tēloja “Džokeru” filmā *The Dark Knight*?',
            'answers' => ['Hīts Ledžers', 'Hoakins Fīnikss', 'Džareds Leto', 'Džeks Nikolsons', 'Toms Hārdijs'],
            'correct' => 0
        ],
        [
            'question' => 'Kura filma uzvarēja “Oskaru” 2020. gadā?',
            'answers' => ['Parazīts', '1917', 'Joker', 'Once Upon a Time in Hollywood', 'Jojo Rabbit'],
            'correct' => 0
        ],
        [
            'question' => 'Kuras valsts kinematogrāfija pazīstama ar “anime”?',
            'answers' => ['Japāna', 'Koreja', 'Ķīna', 'ASV', 'Vācija'],
            'correct' => 0
        ],
        [
            'question' => 'Kur notiek darbība filmā “Avatar”?',
            'answers' => ['Pandorā', 'Marsā', 'Zemes nākotnē', 'Atlantīdā', 'Andromedā'],
            'correct' => 0
        ],
        [
            'question' => 'Kurš aktieris spēlēja kapteini Džeku Sperovu?',
            'answers' => ['Džonijs Deps', 'Orlands Blūms', 'Leonardo Di Kaprio', 'Roberts Daunijs Jr.', 'Harisons Fords'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir galvenais ļaundaris filmā “Star Wars”?',
            'answers' => ['Dārts Veiders', 'Joda', 'Lūks Skaiwalkers', 'Obi Van Kenobi', 'Hans Solo'],
            'correct' => 0
        ],
        [
            'question' => 'Kurā valstī norisinās filma “Slumdog Millionaire”?',
            'answers' => ['Indijā', 'Bangladešā', 'Pakistānā', 'Šrilankā', 'Nepālā'],
            'correct' => 0
        ],
        [
            'question' => 'Kura ir visskatītākā filma pasaulē (peļņas ziņā)?',
            'answers' => ['Avatar', 'Avengers: Endgame', 'Titanic', 'Star Wars', 'Frozen II'],
            'correct' => 0
        ],
    ],
];

           foreach ($quizData as $topicName => $questions) {
            $topic = QuizTopic::create([
                'topic_name' => $topicName,
                'description' => "Jautājumi par tēmu: $topicName",
            ]);

            foreach ($questions as $q) {
                $question = QuizQuestion::create([
                    'topic_id' => $topic->id,
                    'question' => $q['question'],
                ]);

                foreach ($q['answers'] as $index => $answer) {
                    QuizAnswer::create([
                        'question_id' => $question->id,
                        'answer' => $answer,
                        'is_it_correct' => $index === $q['correct'],
                    ]);
                }
            }
        }
    }
}