<x-layout>
    <x-slot:title>Rezultāts</x-slot:title>
    <x-nav />

    <div style="text-align:center; margin-top:50px;">
        <h2>Tests pabeigts!</h2>
        <p>Punkti: {{ $score }} no {{ $total }}</p>
        <p>Laiks: {{ $min }}:{{ str_pad($sec, 2, '0', STR_PAD_LEFT) }} min</p>

        <form action="/quiz/start" method="POST">
            @csrf
            <input type="hidden" name="topic" value="{{ $topicId }}">
            <input type="submit" value="Atkārtoti pildīt">
        </form>
        <a href="/">Atgriezties</a>
    </div>
</x-layout>
