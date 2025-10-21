<x-layout>
    <x-slot:title>
        HomePage
    </x-slot:title>

    <x-nav />
    
<div class="quizContainer">
    @foreach ($quizz as $quiz)
        <div class="quizBoard">
            <form method="GET" action="/quiz/{{ $quiz->id }}">
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                <div>{{ $quiz->topic_name }}</div>
                <button type="submit">Skatīt</button>
            </form>
        </div>
    @endforeach
</div>

</x-layout>