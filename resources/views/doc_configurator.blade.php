<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doc Editor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    
    <link href="{{ asset('css/tailwind_styles.css') }}" rel="stylesheet"> 
     
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
         
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left sm:ml-0"> 
                    <h1 style="font-weight: bold; font-size:35px; margin:30px 0;">
                        [{{ $doc->id }}]
                        {{ $doc->name }}
                    </h1> 
                    <div>
                        <p>{{ $doc->text }}</p>
                    </div>
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
