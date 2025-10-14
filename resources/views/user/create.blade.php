<x-layout>
    <x-slot:title>
        Quiz SignIn

    </x-slot:title>

        <div id="SignUp" class="logcontainer">
            <div class="loginform">
        <h1>SignUp</h1>
    
        <form action="/SignUp" method="POST">
            @csrf
            <input type="text" name="username" placeholder="UserName" class="input">
            <input type="password" name="password" placeholder="Password" class="input">

            <div class="button">
                <input type="submit" value="SignUp" class="button1">
                <input type="button" onclick="location.href='/Login'" value="Log in" class="button1">
            </div>
        </form>
        </div>
    </div>
</x-layout>
