<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | IT Exam System</title>

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

        .wrapper {
            padding: 1.25rem;
            border-radius: .5rem;
            background-color: #04061F60;
            backdrop-filter: blur(2px);
            box-shadow: var(--shadow-sm);
            color: var(--white);
            gap: 2.25rem;
            display: flex;
            flex-flow: column;
            margin-bottom: 10rem;
        }

        .wrapper>header {
            display: flex;
            gap: 1.25rem;
            align-items: center;
        }

        .wrapper>header>img {
            height: 76px;
            aspec-ratio: 1/1;
        }

        .wrapper>.login-links {
            display: flex;
            justify-content: center;
            gap: 1.25rem;
        }

        .wrapper>.login-links>a {
            padding: 0.75rem;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 0.25rem;
            text-decoration: none;
        }

        .wrapper>.login-links>a:hover {
            background-color: var(--primary-hover);
        }

        .wrapper>.login-links>a:active {
            background-color: var(--primary-active);
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <header>
            <img src="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" alt="">
            <div>
                <h1>IT Exam System</h1>
                <p>Eastern Visayas State University</p>
            </div>
        </header>


        <div class="login-links">
            <a href="student/login">I'm a Student</a>
            <a href="/teacher/login">I'm a Teacher</a>
        </div>

    </div>

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
