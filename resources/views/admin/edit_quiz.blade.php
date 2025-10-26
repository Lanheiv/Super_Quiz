<x-layout>
    <x-slot:title>
        Edit quiz
    </x-slot:title>
    <x-nav />

    <h2>Quiz saraksts</h2>

    <div>
        <a href="/admin/create/quiz">Izveidot jaunu quiz</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Quiz nosaukums</th>
                <th>Apraksts</th>
                <th>Darbība</th>
            </tr>
        </thead>

        <tbody>
            @foreach($QuizTopic as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->description }}</td>
                <td>
                    <form action="/admin/delete/quiz/{{ $topic->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Vai tiešām dzēst šo lietotāju?');">
                        @csrf
                        <button type="submit" name="delete_quiz">Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>