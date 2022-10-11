<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Log in | IT Exam System</title>
    <link rel="shortcut icon" href="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" type="image/x-icon">

    {{-- app style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- vanta css --}}
    <link rel="stylesheet" href="{{ asset('css/vanta.css') }}">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center
        }

        form {
            width: 456px;
            border-radius: .5rem;
            padding: 1.25rem;
            background-color: #04061F60;
            backdrop-filter: blur(2px);
            box-shadow: var(--shadow-sm);
            color: var(--white);
            display: flex;
            flex-flow: column;
            gap: 2.25rem;
        }

        form>header {
            display: flex;
            gap: 1.25rem;
        }

        form>header>img {
            height: 76px;
            aspect-ratio: 1/1;
        }

        form>header>div {
            display: flex;
            flex-flow: column;
            gap: .25rem;
            justify-content: center
        }

        form>main {
            display: flex;
            flex-flow: column;
            gap: 1.25rem;

        }

        form>main>h2 {
            text-align: center;
        }

        form>main>div {
            display: flex;
            flex-flow: column;
            gap: .25rem;
        }

        .bottom-links {
            display: flex;
            flex-flow: row;
            justify-content: space-between;
        }

        .bottom-links>a {
            display: block;
            width: max-content;
            color: var(--white);
            text-decoration: none;
        }

        .bottom-links>a:hover {
            color: var(--primary-hover);
        }

        .bottom-links>a:active {
            color: var(--primary-active);
        }
    </style>

</head>

<body>

    <form action="/student/authenticate" method="POST">
        @csrf

        <header>
            <img src="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" alt="school-logo">
            <div>
                <h1>IT Exam System</h1>
                <p>Eastern Visayas State University</p>
            </div>
        </header>

        <main>
            <h2>Student Log In</h2>

            @if (session()->has('toasts'))
                <div class="error-message">
                    @foreach (session()->get('toasts') as $message)
                        {{ $message['message'] }} <br>
                    @endforeach
                </div>
            @endif

            <div>
                <label for="username">Student ID</label>
                <input type="text" class="input" name="student_id" id="student_id" value="{{ old('student_id') }}" required>
                @error('student_id')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" class="input" name="password" id="password" required>
                @error('password')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="button">LOG IN</button>

            <div class="bottom-links">
                <a href="/">Go back</a>
                <a href="/student/signup">Sign up here</a>
            </div>
        </main>

    </form>


    {{-- vanta toggle --}}
    <div class="vanta-toggle-wrapper">
        <input type="checkbox" id="vanta-toggle">
        <label for="vanta-toggle">Toggle background</label>
    </div>

    {{-- vanta js --}}
    <script src="{{ asset('js/three.min.js') }}"></script>
    <script src="{{ asset('js/vanta.net.min.js') }}"></script>
    <script src="{{ asset('js/vanta.js') }}"></script>
</body>

</html>
