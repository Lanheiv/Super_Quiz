<x-layout>
    <x-slot:title>
        Edit quiz
    </x-slot:title>

    @foreach ($QuizTopic as $QuizTopic)
        <p>{{ $QuizTopic->topic_name }}</p>
    @endforeach


</x-layout>