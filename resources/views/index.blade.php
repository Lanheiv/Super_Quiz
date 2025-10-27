<x-layout>
    <x-slot:title>
        HomePage
    </x-slot:title>
    <x-nav />

    <div>
        <form action="/quiz/start" method="POST">
            @csrf
            
            <select name="topic">
                @foreach ($quizz as $quiz)
                    <option value="{{ $quiz->id }}">{{ $quiz->topic_name }}</option>
                @endforeach
            </select>

            <input type="submit" value="Sākt pildīt">
        </form>
    </div>

</x-layout>