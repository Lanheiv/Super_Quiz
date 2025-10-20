<?php 

namespace Database\Seeders\Topics;

use Illuminate\Database\Seeder;
use App\Models\QuizTopic;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class HealthSeeder extends Seeder
{
    public function run(): void
    
    {

$quizData = [
     'Veselība' => [
        [
            'question' => 'Cik kaulu ir cilvēka ķermenī?',
            'answers' => ['206', '210', '200', '180', '220'],
            'correct' => 0
        ],
        [
            'question' => 'Kāda ir normāla cilvēka ķermeņa temperatūra?',
            'answers' => ['36–37°C', '35°C', '38°C', '39°C', '40°C'],
            'correct' => 0
        ],
        [
            'question' => 'Kurš vitamīns veicina redzi?',
            'answers' => ['A vitamīns', 'B vitamīns', 'C vitamīns', 'D vitamīns', 'E vitamīns'],
            'correct' => 0
        ],
        [
            'question' => 'Cik reizes dienā ieteicams ēst?',
            'answers' => ['3', '1', '2', '4', '5'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir sirds galvenā funkcija?',
            'answers' => ['Asins sūknēšana', 'Elpošana', 'Gremošana', 'Nervu signālu pārsūtīšana', 'Hormonu ražošana'],
            'correct' => 0
        ],
        [
            'question' => 'Kura aktivitāte vislabāk uzlabo sirds veselību?',
            'answers' => ['Kardio', 'Šahs', 'Datorspēles', 'Lasīšana', 'Sēdēšana'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir BMI?',
            'answers' => ['Ķermeņa masas indekss', 'Asins spiediens', 'Pulss', 'Vitamīnu līmenis', 'Tauku procentuālais daudzums'],
            'correct' => 0
        ],
        [
            'question' => 'Kura pārtika ir bagāta ar olbaltumvielām?',
            'answers' => ['Olas', 'Saldumi', 'Maize', 'Sula', 'Kafija'],
            'correct' => 0
        ],
        [
            'question' => 'Cik ūdens glāzes dienā ieteicams dzert?',
            'answers' => ['8', '4', '6', '10', '12'],
            'correct' => 0
        ],
        [
            'question' => 'Kas veicina kaulu stiprumu?',
            'answers' => ['Kalcijs', 'C vitamīns', 'D vitamīns', 'B12 vitamīns', 'Magnijs'],
            'correct' => 0
        ],
        [
            'question' => 'Cik sirdsdarbības reizes minūtē ir normāli pieaugušam cilvēkam?',
            'answers' => ['60–100', '40–60', '100–120', '120–140', '30–50'],
            'correct' => 0
        ],
        [
            'question' => 'Kura pārtika satur daudz antioksidantu?',
            'answers' => ['Ogas', 'Maize', 'Sviests', 'Piens', 'Gaļa'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir galvenais iemesls cukura diabētam?',
            'answers' => ['Insulīna problēma', 'Sirdsdarbība', 'Asins spiediens', 'Elpošana', 'Nervu sistēma'],
            'correct' => 0
        ],
        [
            'question' => 'Kura aktivitāte vislabāk trenē muskuļus?',
            'answers' => ['Spēka treniņi', 'Skriešana', 'Lasīšana', 'Klausīšanās mūzikā', 'Pastaiga'],
            'correct' => 0
        ],
        [
            'question' => 'Kura pārtika ir bagāta ar šķiedrvielām?',
            'answers' => ['Augļi un dārzeņi', 'Gaļa', 'Piens', 'Saldumi', 'Sula'],
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