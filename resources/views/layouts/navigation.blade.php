<nav x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 bg-gray-900 dark:bg-gray-900 border-b border-gray-700">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-4">
        <!-- Logo + Homepage + Main Links -->
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-blue-200" />
            </a>
            <a href="{{ route('home') }}" class="text-lg font-semibold text-blue-200 hover:underline">Homepage</a>
            @auth
                <a href="{{ route('reservations.index') }}" class="text-blue-200 hover:underline">My reservations</a>
                <a href="{{ route('reviews.index') }}" class="text-blue-200 hover:underline">My reviews</a>
                <a href="{{ route('unicorns.index') }}" class="text-blue-200 hover:underline">Show all unicorns</a>
            @endauth
        </div>
        <!-- User Dropdown / Auth Links -->
        <div class="flex items-center space-x-6">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-200 bg-gray-900 hover:text-gray-300 focus:outline-none transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ms-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <a href="{{ route('login') }}" class="text-gray-200 hover:underline">Log in</a>
                <a href="{{ route('register') }}" class="text-gray-200 hover:underline">Register</a>
            @endauth

            <!-- Hamburger for mobile -->
            <div class="sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-200 hover:text-gray-400 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-gray-400 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-900 border-t border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <a href="{{ route('reservations.index') }}" class="block px-4 py-2 text-white hover:bg-gray-800">My reservations</a>
                <a href="{{ route('reviews.index') }}" class="block px-4 py-2 text-white hover:bg-gray-800">My reviews</a>
                <a href="{{ route('unicorns.index') }}" class="block px-4 py-2 text-white hover:bg-gray-800">Show all unicorns</a>
            @endauth
        </div>
        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-white hover:bg-gray-800">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-white hover:bg-gray-800"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-700">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-white hover:bg-gray-800">Log in</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-white hover:bg-gray-800">Register</a>
            </div>
        @endauth
    </div>
</nav>
