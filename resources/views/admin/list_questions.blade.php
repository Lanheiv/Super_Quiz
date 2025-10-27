<x-layout>
    <x-slot:title>
        List questions
    </x-slot:title>
    <x-nav />

    <h2>Jautājumu saraksts</h2>

    <div>
        <a href="/admin/create/question/{{$quizId}}">Izveidot jaunu jautājumu</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Jautājums</th>
                <th>Pareizā atbilde</th>
                <th>1. atbilde</th>
                <th>2. atbilde</th>
                <th>3. atbilde</th>
                <th>4. atbilde</th>
                <th>Darbības</th>
            </tr>
        </thead>

        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $question->question }}</td>
                
                @php
                    $answer_list = $answers->where('question_id', $question->id)->values();
                @endphp

                <td>{{ $answer_list->firstWhere('is_it_correct', 1)?->answer}}</td>
                <td>{{ $answer_list[0]->answer ?? '' }}</td>
                <td>{{ $answer_list[1]->answer ?? '' }}</td>
                <td>{{ $answer_list[2]->answer ?? '' }}</td>
                <td>{{ $answer_list[3]->answer ?? '' }}</td>

                <td>
                    <form action="/admin/edit/question/{{$question->id}}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit" name="edit_question">Rediģēt</button>
                    </form>

                    <form action="/admin/delete/question/{{$question->topic_id}}/{{$question->id}}" method="POST" style="display:inline;" onsubmit="return confirm('Vai tiešām dzēst šo tematu?');">
                        @csrf
                        <button type="submit" name="delete_question">Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>