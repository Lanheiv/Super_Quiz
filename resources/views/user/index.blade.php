<x-layout>
    <x-slot:title>
        Quiz login
    </x-slot:title>

    <div id="login">
        <h1>Login</h1>
        <form action="/" method="POST">
            <input type="text" name="username" placeholder="UserName" required>
            <input type="password" name="password" placeholder="Password" required>

            <div class="button">
                <input type="submit" value="Login">
                <input type="button" onclick="location.href='/SignUp'" value="Sign Up">
            </div>
        </form>
    </div>

</x-latout>