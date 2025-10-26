<?php 

namespace Database\Seeders\Topics;

use Illuminate\Database\Seeder;
use App\Models\QuizTopic;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class SportsSeeder extends Seeder
{
    public function run(): void
    
    {

$quizData = [

    'Sports' => [
        [
            'question' => 'Kurā gadā Latvija pirmoreiz piedalījās Olimpiskajās spēlēs?',
            'answers' => ['1924', '1936', '1952', '1992', '2004'],
            'correct' => 0
        ],
        [
            'question' => 'Cik spēlētāju vienlaikus ir futbola komandā laukumā?',
            'answers' => ['11', '10', '12', '9', '13'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir pasaulē slavenākais basketbolists ar iesauku “King James”?',
            'answers' => ['Lebrons Džeimss', 'Maikls Džordans', 'Kobe Braients', 'Stefans Karijs', 'Kevins Durants'],
            'correct' => 0
        ],
        [
            'question' => 'Cik minūšu ilgst futbola spēle?',
            'answers' => ['90', '60', '100', '80', '70'],
            'correct' => 0
        ],
        [
            'question' => 'Kā sauc sporta veidu, kurā izmanto airus?',
            'answers' => ['Airēšana', 'Sērfošana', 'Regbijs', 'Peldēšana', 'Teniss'],
            'correct' => 0
        ],
        [
            'question' => 'Cik apļu ir maratonā?',
            'answers' => ['Nav apļu, distance 42 km', '10 apļi', '20 apļi', '1 aplis', '5 apļi'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir olimpisko spēļu simbols?',
            'answers' => ['Pieci savienoti riņķi', 'Karogs', 'Dziesma', 'Lāpa', 'Kausa attēls'],
            'correct' => 0
        ],
        [
            'question' => 'Kāda bumba tiek izmantota volejbolā?',
            'answers' => ['Vieglā, mīkstā bumba', 'Cieta gumijas bumba', 'Basketbola bumba', 'Futbola bumba', 'Pingponga bumbiņa'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir Latvijas izcilākais basketbolists NBA?',
            'answers' => ['Kristaps Porziņģis', 'Dāvis Bertāns', 'Kaspars Kambala', 'Artūrs Žagars', 'Sandis Valters'],
            'correct' => 0
        ],
        [
            'question' => 'Cik spēlētāju ir hokeja komandā uz ledus (ieskaitot vārtsargu)?',
            'answers' => ['6', '5', '7', '8', '4'],
            'correct' => 0
        ],
        [
            'question' => 'Kurš sporta čempionāts ir “Tour de France”?',
            'answers' => ['Riteņbraukšana', 'Skriešana', 'Peldēšana', 'Auto sacīkstes', 'Triatlons'],
            'correct' => 0
        ],
        [
            'question' => 'Cik punktus dod trīspunktu metiens basketbolā?',
            'answers' => ['3', '2', '1', '4', '5'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir hokeja vārtsarga galvenais aprīkojums?',
            'answers' => ['Maskas un bruņas', 'Cepure', 'Kurpes', 'Cimdi', 'Josta'],
            'correct' => 0
        ],
        [
            'question' => 'Kura valsts uzvarēja 2018. gada FIFA Pasaules kausa finālā?',
            'answers' => ['Francija', 'Horvātija', 'Brazīlija', 'Vācija', 'Argentīna'],
            'correct' => 0
        ],
        [
            'question' => 'Cik metrus garš ir standarta futbola laukums?',
            'answers' => ['100–110', '80–85', '50', '130', '70'],
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
                        'topic_id' => $topic->id,
                        'question_id' => $question->id,
                        'answer' => $answer,
                        'is_it_correct' => $index === $q['correct'],
                    ]);
                }
            }
        }
    }
}
?>
