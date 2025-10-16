<x-layout>
    <x-slot:title>
        HomePage
    </x-slot:title>
    
    <div class="quizContainer">
    @foreach ($quizz as $quiz)
      <div class="quizBoard"><a href="/quiz/{{ $quiz->id }}">{{ $quiz->quiz_topic }}</a></div>
    @endforeach
    </div>

</x-layout>