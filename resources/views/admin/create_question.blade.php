<x-layout>
    <x-slot:title>
        Create question
    </x-slot:title>
    <x-nav />

    <h2>Izveidot jaunu jautājumu</h2>

    <form action="/admin/create/question/{{$id}}" method="POST">
        @csrf

        <div>
            <label for="question">Jautājums:</label>
            <input type="text" id="question" name="question" required>
        </div>

        <div>
            <h3>Atbildes:</h3>
            @for($i = 0; $i < 4; $i++)
                <div>
                    <label>Atbilde {{ $i + 1 }}:</label>
                    <input type="text" name="answers[]" required>

                    <label>
                        <input type="radio" name="correct_answer" value="{{ $i }}" required>
                        pareizā atbilde
                    </label>
                </div>
            @endfor
        </div>

        <button type="submit">Izveidot jautājumu</button>
    </form>
</x-layout>
