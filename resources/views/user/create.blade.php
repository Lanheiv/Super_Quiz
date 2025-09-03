<x-layout>
    <x-slot:title>
        Quiz sign up
    </x-slot:title>

    <div id="login">
        <h1>sign up</h1>
        <form action="/Login" method="POST">
            @csrf
            <input type="text" name="username" placeholder="create UserName" required>
            <input type="password" name="password" placeholder="create Password" required>

            <div class="button">
                <input type="submit" value="Sign Up">
                <input type="button" onclick="location.href='/Login'" value="Login">
            </div>
        </form>
    </div>

</x-latout>