<x-layout>
    <x-slot:title>
        Lietotāja pārvaldība
    </x-slot:title>

    <h2>Lietotāja informācija</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><strong>Lietotājvārds:</strong> {{ $user->username }}</p>
    <p><strong>Statuss:</strong> {{ $user->admin ? 'Administrators' : 'Parasts lietotājs' }}</p>

    <form action="/admin/user/{{ $user->id }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" name="toggle_admin">
            {{ $user->admin ? '❌ Noņemt administratora tiesības' : '⭐ Piešķirt administratora tiesības' }}
        </button>
    </form>

    <form action="/admin/user/{{ $user->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Vai tiešām dzēst šo lietotāju?');">
        @csrf
        <button type="submit" name="delete_user" style="color:red;">🗑 Dzēst lietotāju</button>
    </form>
</x-layout>
