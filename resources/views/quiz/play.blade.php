<x-layout>
    <x-slot:title>
        Quiz timezone_offset_get
    </x-slot:title>

    <h2>{{ $question->question }}</h2>

    <div style="background:#eee; border-radius:5px; overflow:hidden; width:100%; height:20px;">
        <div style="width:{{ $progress }}%; background:green; height:100%;"></div>
    </div>

    <form action="/quiz/{{ $topicId }}/answer" method="POST">
        @csrf
        @foreach ($answers as $answer)
            <div>
                <label>
                    <input type="radio" name="answer" value="{{ $answer->id }}" required>
                    {{ $answer->answer }}
                </label>
            </div>
        @endforeach

        <button type="submit">Nākamais jautājums</button>
    </form>
</x-layout>
