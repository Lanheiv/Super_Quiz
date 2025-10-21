<?php 

namespace Database\Seeders\Topics;

use Illuminate\Database\Seeder;
use App\Models\QuizTopic;
use App\Models\QuizQuestion;
use App\Models\QuizAnswer;

class ProgrammingSeeder extends Seeder
{
    public function run(): void
    
    {

$quizData = [

     'Programmēšana' => [
        [
            'question' => 'Ko nozīmē HTML?',
            'answers' => ['HyperText Markup Language', 'HighTech Machine Logic', 'Hyper Tool Machine Language', 'Hyper Terminal Management Link', 'Human Text Managing Layer'],
            'correct' => 0
        ],
        [
            'question' => 'Ar kuru valodu stilizē tīmekļa lapas?',
            'answers' => ['CSS', 'PHP', 'HTML', 'SQL', 'Python'],
            'correct' => 0
        ],
        [
            'question' => 'Kādu simbolu lieto PHP komentāriem?',
            'answers' => ['//', '#', '/* */', '--', '<>'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir JavaScript galvenā funkcija tīmeklī?',
            'answers' => ['Dinamiska satura pievienošana', 'Attēlu saspiešana', 'Datu bāzes pārvaldība', 'Drošības pārbaude', 'Serveru restartēšana'],
            'correct' => 0
        ],
        [
            'question' => 'Kāda ir galvenā datubāzu valoda?',
            'answers' => ['SQL', 'HTML', 'C++', 'CSS', 'Ruby'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir objekts programmēšanā?',
            'answers' => ['Datu un funkciju kopums', 'Fails', 'Mainīgais', 'Komanda', 'Komentārs'],
            'correct' => 0
        ],
        [
            'question' => 'Kādu valodu izmanto servera puses programmēšanai?',
            'answers' => ['PHP', 'HTML', 'CSS', 'JavaScript', 'JSON'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir cikls programmēšanā?',
            'answers' => ['Atkārtota darbību izpilde', 'Funkcija', 'Mainīgais', 'Kļūda', 'Komentārs'],
            'correct' => 0
        ],
        [
            'question' => 'Kāda valoda ir interpretēta, nevis kompilēta?',
            'answers' => ['Python', 'C++', 'Java', 'C#', 'Go'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir masīvs programmēšanā?',
            'answers' => ['Vērtību saraksts', 'Funkcija', 'Fails', 'Objekts', 'Komentārs'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir API?',
            'answers' => ['Programmas saskarne', 'Datubāze', 'Serveris', 'Klients', 'Fails'],
            'correct' => 0
        ],
        [
            'question' => 'Kāda ir PHP galvenā funkcija?',
            'answers' => ['Servera puses skriptu izpilde', 'Attēlu rediģēšana', 'Tīmekļa pārlūka dizains', 'Datu bāzes dzēšana', 'Failu glabāšana'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir Git?',
            'answers' => ['Versiju kontroles sistēma', 'Programmas valoda', 'Serveris', 'Datubāze', 'Fails'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir funkcija programmēšanā?',
            'answers' => ['Darbību bloks ar nosaukumu', 'Mainīgais', 'Objekts', 'Masīvs', 'Komentārs'],
            'correct' => 0
        ],
        [
            'question' => 'Kas ir HTML tags?',
            'answers' => ['Elementa apzīmējums', 'Datubāzes lauks', 'Funkcija', 'Objekts', 'Komentārs'],
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





















?>