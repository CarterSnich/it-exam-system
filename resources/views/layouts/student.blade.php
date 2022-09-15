<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title', 'IT Exam System')</title>

    {{-- app style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- layout style --}}
    <style>
        /* body */
        body {
            display: flex;
            flex-flow: column;
        }

        /* header */
        header {
            position: sticky;
            top: 0;
            height: 56px;
            max-height: 56px;
            display: flex;
            justify-content: space-between;
            padding: .75rem 1.25rem;
            background-color: #00000000;
            backdrop-filter: blur(2px);
        }

        /* account menur */
        div.account-menu {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        div.account-menu>div,
        div.account-menu>a {
            display: flex;
            align-items: center;
            gap: .75rem;
            color: var(--white);
        }

        div.account-menu>hr {
            height: calc(100% - .25rem);
            width: 2px;
        }

        /* brand link */
        a.brand-link {
            display: flex;
            gap: .75rem;
            align-items: center;
            color: var(--white);
            text-decoration: none
        }

        a.brand-link>img {
            height: 32px;
            width: 32px;
            aspect-ratio: 1/1;
        }

        /* account-menu-dropdown */
        .account-menu-dropdown {
            position: absolute;
            height: 100px;
            width: 256px;
            border: 1px solid red;
            top: calc(.25rem + 56px);
            right: 1.75rem;
            z-index: 1;
            background-color: #00000000;
            backdrop-filter: blur(2px);
        }

        .account-menu-dropdown {}

        /* main */
        main {
            flex-grow: 1;
            overflow: hidden;
            width: 100%;


        }
    </style>

    @yield('page_style')
</head>

<body>

    <header>
        {{-- brand link --}}
        <a class="brand-link">
            <img src="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" alt="brand_img">


            <div>
                <h4>IT Exam System</h2>
                    <small>Eastern Visayas State University</small>
            </div>
        </a>

        {{--  --}}
        <ul>
            <li>
                <a href="/classes"></a>
            </li>
        </ul>

        <div class="account-menu">
            {{-- student name --}}
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>

                <span>
                    {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}
                </span>
            </a>
        </div>


    </header>

    <div class="account-menu-dropdown">

        <div>
            <img src="" alt="">
            <p>{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}</p>
        </div>

        <ul>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="/student/logout">Log out</a></li>
        </ul>

    </div>


    <main>
        @yield('page_content')
    </main>

</body>

</html>
