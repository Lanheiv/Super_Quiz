<x-layout>
    <x-slot:title>
        Quiz login
    </x-slot:title>
    
    <div id="login" class="logcontainer">
        <div class="loginform">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="username" placeholder="UserName" class="input">
            <input type="password" name="password" placeholder="Password" class="input">

            <div class="button">
                <input type="submit" value="Login" class="button1">
                <input type="button" onclick="location.href='/signup'" value="Sign Up" class="button2">
                <input type="button" onclick="location.href='/homePage'" value="homePage">
            </div>
        </form>
        </div>
    </div>

</x-layout>