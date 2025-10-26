<x-layout>
    <x-slot:title>
        Edit user
    </x-slot:title>
    <x-nav />

    <h2>Lietotāju saraksts</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Lietotājvārds</th>
                <th>Statuss</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->admin ? 'Administrators' : 'Parasts lietotājs' }}</td>
                <td>
                    <form action="/admin/users/{{ $user->id }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" name="toggle_admin">
                            {{ $user->admin ? '❌ Noņemt admin' : '⭐ Piešķirt admin' }}
                        </button>
                    </form>
                    <form action="/admin/users/{{ $user->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Vai tiešām dzēst šo lietotāju?');">
                        @csrf
                        <button type="submit" name="delete_user" style="color:red;">🗑 Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
