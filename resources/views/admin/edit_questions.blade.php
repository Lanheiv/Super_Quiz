<x-layout>
    <x-slot:title>
        Edit question
    </x-slot:title>
    <x-nav />

    <h2>Rediģēt jautājumu</h2>

    <form action="/admin/edit/question/{{ $question->id }}" method="POST">
        @csrf

        <div>
            <label for="question">Jautājums:</label>
            <input type="text" id="question" name="question" value="{{ $question->question }}" required>
        </div>

        <div>
            <h3>Atbildes:</h3>
            @foreach($answers as $index => $answer)
                <div>
                    <label>Atbilde {{ $index + 1 }}:</label>
                    <input type="text" name="answers[]" value="{{ $answer->answer }}" required>

                    <label>
                        <input type="radio" name="correct_answer" value="{{ $index }}" 
                            {{ $answer->is_it_correct ? 'checked' : '' }} required>
                        pareizā atbilde
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit">Saglabāt izmaiņas</button>
    </form>
</x-layout>
