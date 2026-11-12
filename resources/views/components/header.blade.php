<header class="bg-white border-b-2 p-4 flex justify-between items-center">
    <a href="{{ route('site.index') }}" class="font-bold text-xl">
        HT - Habit Tracker
    </a>

    <div>
        @auth
            <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="border-2 p-2">Sair</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('site.login') }}" class="border-2 p-2">Login</a>
        @endguest
    </div>
</header>