<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.png" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>

                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                    @csrf

                    <button type="submit">Log Out</button>
                </form>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
            @endauth

        <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>