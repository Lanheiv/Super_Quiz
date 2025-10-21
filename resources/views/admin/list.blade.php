<x-layout>
    <x-slot:title>
        Lietotāju saraksts
    </x-slot:title>

    <h2>Lietotāju saraksts</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lietotājvārds</th>
                <th>Statuss</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->admin ? 'Administrators' : 'Parasts lietotājs' }}</td>
                    <td>
                        <a href="/admin/user/{{ $user->id }}">✏️ Rediģēt</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
