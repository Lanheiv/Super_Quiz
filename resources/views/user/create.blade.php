<x-layout>
    <x-slot:title>
        Quiz SignIn

    </x-slot:title>

        <div id="SignUp">
        <h1>SignUp</h1>
        <form action="/SignUp" method="POST">
            @csrf
            <input type="text" name="username" placeholder="UserName">
            <input type="password" name="password" placeholder="Password">

            <div class="button">
                <input type="submit" value="SignUp">
                <input type="button" onclick="location.href='/Login'" value="Log in">
            </div>
        </form>
    </div>

</x-latout>