<x-guest-layout>
    <h1 class="text-2xl font-bold text-center text-white mb-8">Log in to your account</h1>
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm text-gray-300 mb-2">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autofocus autocomplete="username"
                   class="block w-full px-4 py-3 rounded-lg bg-white text-gray-900 border border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div>
            <label for="password" class="block text-sm text-gray-300 mb-2">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="block w-full px-4 py-3 rounded-lg bg-white text-gray-900 border border-gray-300 focus:border-blue-600 focus:ring focus:ring-blue-500 focus:ring-opacity-50 transition" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
            <label for="remember_me" class="ml-2 block text-sm text-gray-400">
                Remember me
            </label>
        </div>

        <div class="flex flex-col space-y-2">
            <button type="submit"
                    class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition shadow focus:outline-none focus:ring-2 focus:ring-blue-400">
                Log in
            </button>
            <div class="flex justify-between text-sm mt-2">
                @if (Route::has('password.request'))
                    <a class="text-gray-400 hover:text-blue-400 transition" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
                <a class="text-gray-400 hover:text-blue-400 transition" href="{{ route('register') }}">
                    Create account
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
