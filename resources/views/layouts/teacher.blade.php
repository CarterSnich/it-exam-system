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
            position: fixed;
            top: 0;
            min-height: 56px;
            max-height: 56px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding-inline: 1.25rem;
            background-color: #00000000;
            backdrop-filter: blur(2px);
            align-items: center;
            z-index: 1;
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

        /* account menu */
        .account-menu {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: .75rem;
        }

        .account-menu>div,
        .account-menu>a {
            display: flex;
            align-items: center;
            gap: .75rem;
            color: var(--white);
        }

        .account-menu>hr {
            align-self: stretch;
            width: 2px;
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


        /* section */
        section {
            height: 100%;
            margin-top: 56px;
            display: grid;
            grid-template-columns: 22% 78%;
        }


        /* main */
        main {
            overflow: hidden;
            width: 100%;
        }
    </style>

    @yield('page_style')
</head>

<body>

    {{-- header --}}
    <header>
        {{-- brand link --}}
        <a class="brand-link">
            <img src="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" alt="brand_img">


            <div>
                <h4>IT Exam System</h2>
                    <small>Eastern Visayas State University</small>
            </div>
        </a>


        <div class="account-menu">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>

                <span>
                    {{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}
                </span>
            </a>

            <hr>

            <a href="" title="Settings">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg>
            </a>

            <a href="/teacher/logout" title="Log out">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                </svg>
            </a>
        </div>


    </header>

    {{-- section --}}
    <section>

        {{-- sidebar --}}
        <x-teacher-sidebar />

        {{-- main --}}
        <main>
            @yield('page_content')
        </main>

    </section>

</body>

</html>
