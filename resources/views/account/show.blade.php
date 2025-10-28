<x-layout>
    <x-slot:title>
        Mans konts
    </x-slot:title>
    <x-nav />

    <h2>Mans konts</h2>

    <div>
        <h3>Izpildīto testu saraksts</h3>

        @foreach($test_results as $result)
            <p>
                Temats: {{ $result->topic->topic_name ?? 'Nezināms' }} <br>
                Rezultāts: {{ $result->result }} / {{ $result->question_numbers }} <br>
                Laiks: 
                @php
                    $minutes = floor($result->complet_time / 60);
                    $seconds = $result->complet_time % 60;
                @endphp
                {{ $minutes }}:{{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }} min <br>
                Izpildes datums {{ $result['created_at'] }}
            </p>
        @endforeach
    </div>


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
