<header>
    <div class="container">
        <div class="header-content flex justify-between items-center py-4">
            <div class="logo">
                <a href="{{ route('home') }}">
                    🕛 <span>TimeTracker</span>
                </a>
            </div>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="text-lg">🏠 Početna</a></li>

                    @auth
                        <li><a href="{{ route('dashboard') }}" class="text-lg">📋 Dashboard</a></li>
                        <li><a href="{{ route('activities.index') }}" class="text-lg">🧾 Aktivnosti</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-lg">🚪 Odjava</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="text-lg">🔑 Prijava</a></li>
                        <li><a href="{{ route('register') }}" class="text-lg">📝 Registracija</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</header>
