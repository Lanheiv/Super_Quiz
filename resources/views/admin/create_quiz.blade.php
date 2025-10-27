<x-layout>
    <x-slot:title>
        Create quiz
    </x-slot:title>
    <x-nav />

    <h2>Quiz izveidošana</h2>

    <form action="/admin/create/quiz" method="POST">
        @csrf
        
        <div>
            Quiz nosaukums:
            <input type="text" name="topic_name" require>
        </div>

        <div>
            Quiz Apraksts:
            <textarea name="topic_name" require></textarea>
        </div>

        <input type="submit" name="description" value="izveidot quiz">
    </form>

</x-layout>