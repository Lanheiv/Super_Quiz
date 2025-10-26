<x-layout>
    <x-slot:title>
        Edit quiz
    </x-slot:title>

    <h2>Quiz saraksts</h2>

    <div>
        <a href="">Izveidot jaunu quiz</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Quiz nosaukums</th>
                <th>Apraksts</th>
                <th>Darbības</th>
            </tr>
        </thead>

        <tbody>
            @foreach($QuizTopic as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->description }}</td>
                <td>
                    <form action="/admin/edit/quiz/{{ $topic->id }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" name="edit_quiz">Rediģēt</button>
                    </form>
                    <form action="/admin/quiz/{{ $topic->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Vai tiešām dzēst šo lietotāju?');">
                        @csrf
                        <button type="submit" name="delete_quiz">Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>