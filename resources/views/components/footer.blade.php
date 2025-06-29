<footer class="bg-gray-900 dark:bg-gray-900 shadow-sm w-full">
    <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between py-2 px-4 text-xl text-gray-400">
        <div class="flex items-center space-x-3">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <x-application-logo class="h-5 w-auto" />
                <span class="font-semibold text-white">Unicorn Rental</span>
            </a>
        </div>
        <ul class="flex flex-wrap items-center space-x-4">
            <li><a href="#" class="hover:underline">About</a></li>
            <li><a href="#" class="hover:underline">Privacy Policy</a></li>
            <li><a href="#" class="hover:underline">Contact</a></li>
        </ul>
        <span class="ml-4">
            © {{ date('Y') }} <a href="{{ route('home') }}" class="hover:underline">Unicorn Rental</a>. All rights reserved.
        </span>
    </div>
</footer>
