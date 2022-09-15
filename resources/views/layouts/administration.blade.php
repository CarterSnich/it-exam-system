<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'IT Exam System')</title>
    <link rel="shortcut icon" href="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" type="image/x-icon">

    {{-- fonts --}}
    <link rel="stylesheet" href="{{ asset('fonts/roboto-v30-latin-regular.woff2') }}" type="woff2">
    <link rel="stylesheet" href="{{ asset('fonts/roboto-mono-v22-latin-regular.woff2') }}" type="woff2">
    <link rel="stylesheet" href="{{ asset('fonts/roboto-condensed-v25-latin-regular.woff2') }}" type="woff2">

    {{-- app style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            position: relative;
            height: 100vh;
            display: flex;
            overflow: hidden;
            flex-direction: row;
        }

        main {
            display: flex;
            flex-direction: column;
            flex-basis: 0 1 0px;
            overflow: hidden;
            width: 100%;
        }

        div.content {
            margin: .75rem;
            margin-top: 0;
            padding: .75rem;
            border-radius: .5rem;
            background-color: rgba(0, 0, 0, .24);
            color: var(--white);
            overflow: auto;
            height: 100%;
        }
    </style>

    {{-- page style --}}
    @yield('page_style')

</head>

<body>

    {{-- alert pop up --}}
    @if (session()->has('toast'))
        <x-alert-pop-up :type="session()->get('toast')['type']" :message="session()->get('toast')['message']" />
    @endif

    {{-- sidebar --}}
    <x-administration-sidebar />

    <main>
        {{-- header --}}
        <x-administration-header />

        <div class="content">
            {{-- content --}}
            @yield('page_content')
        </div>
    </main>

    {{-- app script --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- layout script --}}
    <script>
        $('.alert').on('click', 'button', function() {
            $(this).parent().fadeOut(function() {
                $(this).remove()
            })
        })
    </script>

    {{-- page script --}}
    @yield('page_script')
</body>

</html>
