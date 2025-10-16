<x-layout>
    <x-slot:title>
        Quiz login
    </x-slot:title>
    
    <div id="login">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">

            <div class="button">
                <input type="submit" value="login">
                <input type="button" onclick="location.href='/signup'" value="Sign Up">
            </div>
        </form>
    </div>

</x-layout>