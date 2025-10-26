<x-layout>
    <x-slot:title>
        Quiz create
    </x-slot:title>
    <x-nav />

    <h2>Quiz izveidošana</h2>

    <form action="/admin/create/quiz" method="POST">
        @csrf
        
        <div>
            Quiz nosaukums:
            <input type="text" require>
        </div>

        <div>
            Quiz Apraksts:
            <textarea require></textarea>
        </div>

        <input type="submit" value="izveidot quiz">
        
    </form>

</x-layout>