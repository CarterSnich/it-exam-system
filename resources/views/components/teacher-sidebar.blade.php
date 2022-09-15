<style>
    /* sidebar */
    .sidebar {
        position: sticky;
        top: 56px;
        max-height: calc(100vh - 56px);
        padding-block: 1.25rem;
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

<nav class="sidebar">

    <ul class="sidebar-links">
        <li>
            <a href="/teacher/dashboard" class="@if (Request::is('teacher/dashboard')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--ci">
                    <path fill="currentColor" d="m4.293 10.707l7-7a1 1 0 0 1 1.414 0l7 7a1 1 0 0 1 .293.707V21a1 1 0 0 1-1 1h-5v-7h-4v7H5a1 1 0 0 1-1-1v-9.586a1 1 0 0 1 .293-.707Z"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/teacher/sections" class="@if (Request::is('teacher/sections') || Request::is('teacher/sections/*')) active @endif">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-sample-full" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--ic">
                    <path fill="currentColor" d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"></path>
                </svg>
                Sections
            </a>
        </li>
    </ul>
</nav>
