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
            align-items: center;
        }

        /* signup wrapper */
        .signup-wrapper {
            display: flex;
            background-color: #04061F60;
            backdrop-filter: blur(2px);
            box-shadow: var(--shadow-sm);
            color: var(--white);
            height: calc(100% - 5.25rem);
            border-radius: .5rem;
            overflow: hidden;
        }


        /* brand wrapper */
        .brand-wrapper {
            position: relative;
            padding: 1.25rem;

            display: flex;
            flex-flow: column;
        }

        .brand-backdrop {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-image: url('../img/IMG_8354_2.jpg');
            background-position: 80%;
            background-size: cover;
            background-repeat: no-repeat;
            filter: brightness(40%);

            z-index: -1;
        }

        .brand-header {
            display: flex;
            flex-flow: row;
            gap: .75rem;
            align-items: center;
            text-shadow: 2px 2px 8px black;
        }

        .brand-header>img {
            height: 64px;
            width: 64px;
        }

        .brand-body {
            flex-grow: 1;
            padding: 1.25rem;

            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: baseline;
        }

        .brand-body>p {
            font-size: 4.25rem;
            text-shadow: 2px 2px 8px black;
        }

        /* signup form */
        .signup-form {
            display: flex;
            flex-grow: 1;
            flex-flow: column;
            gap: 1.25rem;
            padding: 1.25rem;
        }

        .signup-form>h2 {
            text-align: center
        }


        /* row */
        .row {
            display: flex;
            flex-direction: row;
            gap: 1.25rem;
        }

        /* col */
        .col {
            display: flex;
            flex-flow: column;
            flex: 1;
            gap: .25rem;
        }

        /* input */
        .input {
            min-width: 256px;
        }

        /* input-rows  */
        .input-rows {
            display: flex;
            flex-direction: column;
            gap: .75rem;
        }

        /* bottom links */
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

    <div class="signup-wrapper">

        <div class="brand-wrapper">

            <div class="brand-backdrop"></div>

            <div class="brand-header">
                <img src="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" alt="school-logo">
                <div>
                    <h2>Eastern Visayas State University</h2>
                </div>
            </div>

            <div class="brand-body">
                <p>IT</p>
                <p>Exam</p>
                <p>System</p>
            </div>

        </div>

        <form action="/student/signup" method="POST" class="signup-form">
            @csrf

            <h2>Student Sign Up</h2>

            @if (session()->has('toasts'))
                <div class="error-message">
                    @foreach (session()->get('toasts') as $message)
                        {{ $message['message'] }} <br>
                    @endforeach
                </div>
            @endif

            <div class="input-rows">

                <div class="row">

                    {{-- username --}}
                    <div class="col">
                        <label for="username">Username</label>
                        <input type="text" class="input" name="username" id="username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- lastname --}}
                    <div class="col">
                        <label for="lastname">Last name</label>
                        <input type="text" class="input" name="lastname" id="lastname" required>
                        @error('lastname')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    {{-- password --}}
                    <div class="col">
                        <label for="password">Password</label>
                        <input type="password" class="input" name="password" id="password" required>
                        @error('password')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- first name --}}
                    <div class="col">
                        <label for="firstname">First name</label>
                        <input type="text" class="input" name="firstname" id="firstname" required>
                        @error('firstname')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- password confirmation --}}
                    <div class="col">
                        <label for="password_confirmation">Re-type password</label>
                        <input type="password" class="input" name="password_confirmation" id="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- middle name --}}
                    <div class="col">
                        <label for="middlename">Middle name</label>
                        <input type="text" class="input" name="middlename" id="middlename" required>
                        @error('middlename')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- section --}}
                    <div class="col">
                        <label for="section">Section</label>
                        <input type="text" class="input" name="section" id="section" required>
                        @error('section')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- course --}}
                    <div class="col">
                        <label for="course">Course</label>
                        <input type="text" class="input" name="course" id="course" required>
                        @error('course')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- email --}}
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="text" class="input" name="email" id="email" pattern="(([a-zA-Z]+)(\.|\_))?[a-zA-Z]+@[a-zA-Z]+(\.[a-zA-Z]+)+" title="Please match the requested format." required>
                        @error('email')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Mobile number --}}
                    <div class="col">
                        <label for="mobile_no">Mobile number</label>
                        <input type="text" class="input" name="mobile_no" id="mobile_no" pattern="09[0-9]{9}" required>
                        @error('mobile_no')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>



            <button type="submit" class="button">SIGN UP</button>

            <div class="bottom-links">
                <a href="/student/login">Log in here</a>
            </div>

        </form>
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
