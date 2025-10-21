<x-layout>
    <x-slot:title>
        Mans konts
    </x-slot:title>

    <h2>Mans konts</h2>

    <p><strong>Lietotājvārds:</strong> {{ $user->username }}</p>
    <p><strong>Statuss:</strong> {{ $user->admin ? 'Administrators' : 'Parasts lietotājs' }}</p>

    <form action="/account/logout" method="POST" style="margin-bottom:10px;">
        @csrf
        <button type="submit" style="background-color: #f00; color: #fff; padding: 8px 16px; border:none; border-radius:4px;">
            Izrakstīties
        </button>
    </form>

    <form action="/account/delete" method="POST" onsubmit="return confirm('Vai tiešām dzēst kontu?');">
        @csrf
        <button type="submit" style="background-color: #555; color: #fff; padding: 8px 16px; border:none; border-radius:4px;">
            Dzēst kontu
        </button>
    </form>
</x-layout>
