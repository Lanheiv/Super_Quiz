<x-layout>
    <x-slot:title>
        List quiz
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
                <th>Darbības</th>
            </tr>
        </thead>

        <tbody>
            @foreach($quiz as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->description }}</td>
                <td>
                    <form action="/admin/questions/{{ $topic->id }}" method="GET" style="display:inline;">
                        @csrf
                        <button type="submit" name="delete_quiz">Pārvaldīt jautājumus</button>
                    </form>

                    <form action="/admin/delete/quiz/{{$topic->id}}" method="POST" style="display:inline;" onsubmit="return confirm('Vai tiešām dzēst šo jautājumu?');">
                        @csrf
                        <button type="submit">Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>