<x-layout>
    <x-slot:title>
        Jautājumi
    </x-slot:title>
    
    <div class="questionContainer">

        @foreach ($questions as $question)
            <div class="quizBoard">
                <div>{{ $question->question }}</div>

                @foreach ($question->answers as $answer)
                    <div>{{ $answer->answer }}</div>
                @endforeach

            </div>
        @endforeach
    </div>
</x-layout>
