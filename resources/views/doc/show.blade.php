<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    
    <link href="{{ asset('css/tailwind_styles.css') }}" rel="stylesheet"> 

</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left sm:ml-0">
                    @if (empty($doc))
                        <h1>Doc {{ $id_parameter }} does not exist</h1>
                    @else
                        <h1 style="font-weight: bold; font-size:35px; margin:30px 0;">
                            [{{ $doc->id }}]
                            {{ $doc->name }}
                        </h1>
                        <form method="post" action="{{ url('getrtf') }}">
                            @csrf

                            <input type="hidden" class="form-control" name="name"
                                value="[{{ $doc->id }}]{{ $doc->name }}">
                            <input type="hidden" class="form-control" name="category" value="{{ $doc->category }}">
                            <input type="hidden" class="form-control" name="text" value="{{ $doc->text }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                скачать RTF
                            </button>
                        </form>
                        <h3 style="font-weight: italic; font-size:25px; margin:15px 0;">{{ $doc->category }}</h3>
                        <hr>
                        <p>{{ $doc->text }}</p>
                        <hr>
                    @endif
                </div>
            </div>
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>
