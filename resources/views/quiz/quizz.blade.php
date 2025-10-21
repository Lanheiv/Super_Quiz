<x-layout>
    <x-slot:title>
        Jautājumi
    </x-slot:title>
    
    <div class="questionContainer">

        @foreach ($questions as $question)
            <div class="questionBoard">
                <p>{{ $question->question }}</p>

                <form>
                    @foreach ($question->answers as $answer)
                        <div>
                            <input 
                                type="radio" 
                                name="question_{{ $question->id }}" 
                                value="{{ $answer->id }}" 
                                id="answer_{{ $answer->id }}"
                            >
                            <label for="answer_{{ $answer->id }}">{{ $answer->answer }}</label>
                        </div>
                    @endforeach
                </form>

            </div>
        @endforeach

    </div>
</x-layout>
