<form action="/" class="relative mx-4 my-2">
    <div class="relative border-2 border-gray-200 rounded-lg shadow-lg overflow-hidden max-w-md mx-auto transition-transform transform hover:scale-105">
        <div class="absolute top-3 left-3 flex items-center pointer-events-none">
            <i class="fa fa-search text-gray-400 transition-colors duration-300 hover:text-gray-600"></i>
        </div>
        <input
            type="text"
            name="search"
            class="h-12 w-full pl-10 pr-16 rounded-lg border-none focus:ring-0 transition-shadow duration-300"
            placeholder="Search Laravel Gigs..."
        />
        <div class="absolute top-2 right-2">
            <button
                type="submit"
                class="h-10 px-4 text-white rounded-lg bg-red-500 hover:bg-red-600 transition-colors duration-300 transform hover:scale-105"
            >
                Search
            </button>
        </div>
    </div>
</form>
