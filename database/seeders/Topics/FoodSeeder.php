<?php 

namespace Database\Seeders\Topics;

use Illuminate\Database\Seeder;
use App\Models\QuizTopic;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class FoodSeeder extends Seeder
{
    public function run(): void

    {

$quizData = [
      'Ēdiens' => [
        [
            'question' => 'Kura pārtika satur visvairāk olbaltumvielu?',
            'answers' => ['Olas', 'Maize', 'Saldumi', 'Piens', 'Sula'],
            'correct' => 0
        ],
        [
            'question' => 'Kura garšviela ir izplatīta Itālijas virtuvē?',
            'answers' => ['Baziliks', 'Ingvers', 'Kurkuma', 'Kanēlis', 'Vaniļa'],
            'correct' => 0
        ],
        [
            'question' => 'No kā gatavo hummusu?',
            'answers' => ['Ciešu turku zirņus', 'Rīsus', 'Olas', 'Piens', 'Gaļu'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir galvenā sastāvdaļa pesto mērcei?',
            'answers' => ['Baziliks', 'Kartupeļi', 'Burkāni', 'Āboli', 'Saldumi'],
            'correct' => 0
        ],
        [
            'question' => 'Kura ogu pārtika satur daudz antioksidantu?',
            'answers' => ['Mellenes', 'Āboli', 'Banāni', 'Kivi', 'Apelsīni'],
            'correct' => 0
        ],
        [
            'question' => 'Kura graudaugu kultūra ir pamats Japānas ēdieniem?',
            'answers' => ['Rīsi', 'Kvieši', 'Kukurūza', 'Auzu pārslas', 'Rupjmaize'],
            'correct' => 0
        ],
        [
            'question' => 'No kā gatavo guakamoli?',
            'answers' => ['Avokado', 'Tomāti', 'Kartupeļi', 'Burkāni', 'Bietes'],
            'correct' => 0
        ],
        [
            'question' => 'Kura pārtika satur daudz vitamīna C?',
            'answers' => ['Apelsīni', 'Piens', 'Sviests', 'Gaļa', 'Maize'],
            'correct' => 0
        ],
        [
            'question' => 'Kura riekstu suga ir bagāta ar omega-3?',
            'answers' => ['Valrieksti', 'Zemesrieksti', 'Indijas rieksti', 'Mandeles', 'Pekanrieksti'],
            'correct' => 0
        ],
        [
            'question' => 'Kura pārtika satur visvairāk šķiedrvielu?',
            'answers' => ['Auzu pārslas', 'Olas', 'Piens', 'Gaļa', 'Saldumi'],
            'correct' => 0
        ],
        [
            'question' => 'No kā gatavo ratatouille?',
            'answers' => ['Dārzeņiem', 'Gaļas produktiem', 'Zivīm', 'Olu maisījuma', 'Riekstiem'],
            'correct' => 0
        ],
        [
            'question' => 'Kura garšviela piešķir ēdienam pikantu garšu?',
            'answers' => ['Čili', 'Baziliks', 'Kanēlis', 'Vaniļa', 'Ingvers'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir galvenā sastāvdaļa tiramisu desertā?',
            'answers' => ['Maskarpone', 'Šokolāde', 'Piens', 'Kafija', 'Saldumi'],
            'correct' => 0
        ],
        [
            'question' => 'Kura pārtika ir tradicionāla Latviešu brokastīs?',
            'answers' => ['Rupjmaize', 'Saldumi', 'Pica', 'Hamburgeri', 'Spageti'],
            'correct' => 0
        ],
        [
            'question' => 'Kura ogu suga tiek izmantota džemos un marmelādēs visbiežāk?',
            'answers' => ['Zemenes', 'Āboli', 'Āboli', 'Bumbieri', 'Apelsīni'],
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