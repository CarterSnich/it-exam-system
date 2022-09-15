<style>
    nav#side-bar {
        min-width: 300px;
        display: flex;
        flex-flow: column;
        gap: 1.75rem;
    }

    a.brand-link {
        display: flex;
        gap: .75rem;
        margin: .75rem;
        align-items: center;
        color: var(--white);
        text-decoration: none
    }

    a.brand-link>img {
        height: 56px;
        width: 56px;
        aspect-ratio: 1/1;
    }

    ul.sidebar-links {
        display: flex;
        flex-flow: column;
        list-style: none;
    }

    ul.sidebar-links>li>a {
        display: flex;
        padding: 1rem 2.25rem;
        text-decoration: none;
        transition: all ease-in-out .3s;
        color: var(--white);
        gap: 0.75rem;
        align-items: center;
        border-top-right-radius: .25rem;
        border-bottom-right-radius: .25rem;
    }

    ul.sidebar-links>li>a:hover {
        color: var(--primary-color) !important;
        background-color: var(--white-hover) !important;
    }

    ul.sidebar-links>li>a:active {
        color: black !important;
        background-color: var(--white-active) !important;
    }

    ul.sidebar-links>li>a.active {
        background-color: var(--white-current);
    }
</style>

<nav id="side-bar">

    <a href="#" class="brand-link">
        <img src="{{ asset('img/237170717_10159380668691838_867040353180657182_n.png') }}" alt="brand_img">

        <div>
            <h2>IT Exam System</h2>
            <small>Eastern Visayas State University</small>
        </div>
    </a>

    <ul class="sidebar-links">
        <li>
            <a href="/administration/dashboard" class="@if (Request::is('administration/dashboard')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--ci">
                    <path fill="currentColor" d="m4.293 10.707l7-7a1 1 0 0 1 1.414 0l7 7a1 1 0 0 1 .293.707V21a1 1 0 0 1-1 1h-5v-7h-4v7H5a1 1 0 0 1-1-1v-9.586a1 1 0 0 1 .293-.707Z"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/administration/teachers" class="@if (Request::is('administration/teachers') || Request::is('administration/teachers/*')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256" class="">
                    <path fill="currentColor" d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h13.4a7.9 7.9 0 0 0 7.2-4.6a48.1 48.1 0 0 1 86.8 0a7.9 7.9 0 0 0 7.2 4.6H216a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16ZM104 168a32 32 0 1 1 32-32a32.1 32.1 0 0 1-32 32Zm112 32h-56.6a63.7 63.7 0 0 0-13.1-16H192a8 8 0 0 0 8-8V80a8 8 0 0 0-8-8H64a8 8 0 0 0-8 8v96a8 8 0 0 0 6 7.7A64.2 64.2 0 0 0 48.6 200H40V56h176Z"></path>
                </svg>
                Teachers
            </a>
        </li>
        <li>
            <a href="/administration/students" class="@if (Request::is('administration/students')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256" class="iconify iconify--ph">
                    <path fill="currentColor" d="m226.5 56.4l-96-32a8.5 8.5 0 0 0-5 0l-95.9 32h-.2l-1 .5h-.1l-1 .6c0 .1-.1.1-.2.2l-.8.7l-.7.8c0 .1-.1.1-.1.2l-.6.9c0 .1 0 .1-.1.2l-.4.9l-.3 1.1v.3A3.7 3.7 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.6 11.2A63.2 63.2 0 0 0 64 120a64 64 0 0 0 30 54.2a96.1 96.1 0 0 0-46.5 37.4a8.1 8.1 0 0 0 2.4 11.1a7.9 7.9 0 0 0 11-2.3a80 80 0 0 1 134.2 0a8 8 0 0 0 6.7 3.6a7.5 7.5 0 0 0 4.3-1.3a8.1 8.1 0 0 0 2.4-11.1a96.1 96.1 0 0 0-46.5-37.4a64 64 0 0 0 30-54.2a63.2 63.2 0 0 0-9.6-33.7l44.1-14.7a8 8 0 0 0 0-15.2ZM128 168a48 48 0 0 1-48-48a48.6 48.6 0 0 1 9.3-28.5l36.2 12.1a8 8 0 0 0 5 0l36.2-12.1A48.6 48.6 0 0 1 176 120a48 48 0 0 1-48 48Z"></path>
                </svg>
                Students
            </a>
        </li>
        <li>
            <a href="/administration/sections" class="@if (Request::is('administration/sections')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--ic">
                    <path fill="currentColor" d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"></path>
                </svg>
                Sections
            </a>
        </li>
    </ul>

</nav>
