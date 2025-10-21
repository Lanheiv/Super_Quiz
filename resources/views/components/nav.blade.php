<nav>
    <ul>
        @if(Auth::check() && Auth::user()->admin)
            <li><a href="/admin/quiz">Pārvaldīt quiz</a></li>
            <li><a href="/admin/users">Pārvaldīt lietotājus</a></li>
        @endif
        <li><a href="/account">Konts</a></li>
    </ul>
</nav>



