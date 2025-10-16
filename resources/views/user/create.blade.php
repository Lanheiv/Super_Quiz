<x-layout>
    <x-slot:title>
        Quiz SignIn

    </x-slot:title>

        <div id="SignUp" class="logcontainer">
            <div class="loginform">
        <h1>SignUp</h1>

        <div class="loginform2">

        <form action="/SignUp" method="POST">
            @csrf
            <input type="text" name="username" placeholder="UserName" class="input">
            <input type="password" name="password" placeholder="Password" class="input">

            <div class="button">
                <input type="submit" value="Sign Up" class="button1">
                <input type="button" onclick="location.href='/login'" value="Login" class="button2">
                <input type="button" onclick="location.href='/homePage'" value="homePage">
            </div>
        </form>
        </div>
        </div>
    </div>
</x-layout>
