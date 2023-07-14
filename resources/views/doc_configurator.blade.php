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

    <script>
        (function() {
            window.DocConfiguratorApp = {
                csrfToken: '{{ csrf_token() }}',
                doc_id: '{{ $doc->id }}',
            };
        })();
    </script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/doc_editor.js'])

</head>

<body class="antialiased">
    <div
        class="container  bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="row">
                <div class="cell-12 flex flex-center text-center">
                    <span>
                        Документ:
                        <h1 style="font-weight: bold; font-size:35px; margin:30px 0;"> 
                            [ ID: {{ $doc->id }} ]
                            {{ $doc->name }}
                        </h1>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="cell-6">
                    <div class="p-6 lg:p-8"
                        style="
                            background-color: #fbfbfb;
                            border-radius: 21px;
                            margin-bottom: 27px;
                        ">
                        <div id="editorjs">
                        </div>
                        <a id="save_data" href="{{ route('doc.create') }}"
                            class=" flex-center scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                            data-image_upload="{{ route('image.upload') }}">
                            Сохранить
                        </a>
                    </div>
                </div>
                <div class="cell-6">
                    <div id="editor_result" class="p-6 lg:p-8">
                        <div>
                            <p>{{ $doc->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</body>

</html>
