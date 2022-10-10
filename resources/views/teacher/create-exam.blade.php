@extends('layouts.teacher')

@section('page_title', 'Section | IT Exam System')

@section('page_style')
    <style>
        /* body */
        body {
            overflow: hidden;
        }

        /* section */
        section {
            overflow: hidden;
        }

        /* main */
        main {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* theme bg */
        div.theme-bg {
            position: absolute;
            inset: 0;
            background-position: right bottom;
            background-repeat: no-repeat;
            filter: blur(2px);
        }

        div.theme-bg.theme-default {
            background-image: var(--sp-default);
        }

        div.theme-bg.theme-blue {
            background-image: var(--sp-blue);
        }

        div.theme-bg.theme-green {
            background-image: var(--sp-green);
        }

        div.theme-bg.theme-pink {
            background-image: var(--sp-pink);
        }

        div.theme-bg.theme-orange {
            background-image: var(--sp-orange);
        }

        div.theme-bg.theme-cyan {
            background-image: var(--sp-cyan);
        }

        div.theme-bg.theme-purple {
            background-image: var(--sp-purple);
        }

        div.theme-bg.theme-lightblue {
            background-image: var(--sp-lightblue);
        }

        div.theme-bg.theme-grey {
            background-image: var(--sp-grey);
        }

        /* content */
        div#content {
            position: relative;
            padding: 0.75rem;
            overflow: hidden;
            flex-grow: 1;

            display: flex;
            flex-direction: column;

            background-color: rgba(0, 0, 0, 0.24);
        }

        /* section nav */
        .section-nav {
            position: sticky;
            top: 0;
            background-color: #04061f60;

            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: stretch;
            padding-inline: 0.75rem;
        }

        /* section header */
        .section-header {
            padding: 0.25rem;
            color: var(--white);
        }

        /* section tabs */
        .section-nav>ul {
            display: flex;
            flex-direction: row;
            justify-content: center;
            list-style: none;
        }

        .section-nav>ul>li>a {
            padding-inline: 0.75rem;
            height: 100%;
            display: grid;
            text-decoration: none;
            transition: all ease-in-out 0.3s;
            color: var(--white);
            place-content: center;
        }

        .section-nav>ul>li>a:hover {
            background-color: var(--primary-hover) !important;
        }

        .section-nav>ul>li>a:active {
            color: black;
            background-color: var(--white-active);
        }

        .section-nav>ul>li>a.active {
            background-color: var(--white-current);
        }

        /* class content */
        .class-content {
            margin-block: 0.75rem;
            flex-grow: 1;
            overflow: auto;
        }

        .class-banner.banner-default {
            background-image: var(--banner-default);
        }

        .class-banner.banner-blue {
            background-image: var(--banner-blue);
        }

        .class-banner.banner-green {
            background-image: var(--banner-green);
        }

        .class-banner.banner-pink {
            background-image: var(--banner-pink);
        }

        .class-banner.banner-orange {
            background-image: var(--banner-orange);
        }

        .class-banner.banner-cyan {
            background-image: var(--banner-cyan);
        }

        .class-banner.banner-purple {
            background-image: var(--banner-purple);
        }

        .class-banner.banner-lightblue {
            background-image: var(--banner-lightblue);
        }

        .class-banner.banner-grey {
            background-image: var(--banner-grey);
        }

        /* table */
        table {
            color: var(--white);
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        table>thead {
            position: sticky;
            top: 0;
        }

        table>thead>tr>th {
            text-align: start;
            padding: 0.75rem;
            background-color: #00000080;
            backdrop-filter: blur(4px);
        }

        table>tbody>tr {
            transition: background-color ease-in-out 0.3s;
        }

        table>tbody>tr:hover {
            background-color: #ffffff50;
        }

        table>tbody>tr>td {
            padding: 0.75rem;
        }

        table>tbody>tr>td>a {
            display: block;
            text-decoration: none;
            color: var(--white);
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        /* create exam button */
        .create-exam-button {
            position: fixed;
            bottom: 1.25rem;
            right: 2.25rem;

            display: flex;
            place-content: center;
            transition: all ease-in-out 0.3s;
            border: none;
            background-color: var(--primary-color);
            border-radius: 50px;
            padding: 0.75rem;
            text-decoration: none;
            color: var(--white);
        }

        .create-exam-button:hover {
            background-color: var(--primary-hover);
        }

        .create-exam-button:active {
            background-color: var(--primary-active);
        }

        /* empty area */
        .empty-area {
            padding: 5.25rem;
            display: grid;
            place-content: center;
            align-items: center;
        }

        .empty-area>* {
            margin: auto;
            color: var(--white);
            filter: brightness(80%);
        }

        .empty-area>p {
            font-size: xx-large;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/exam-creator.css') }}">
@endsection

@section('page_content')

    <div class="theme-bg theme-{{ $section->theme_color }}"></div>

    <div id="content">

        {{-- navbar --}}
        <nav class="section-nav">

            <div class="section-header">
                <h2 class="section-name">{{ $section->section_name }}</h2>
                <div class="section-course">{{ $section->course }}</div>
            </div>

            <ul>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/class" class="@if (Request::is('teacher/sections/*/class')) active @endif">
                        Class
                    </a>
                </li>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/exams" class="@if (Request::is('teacher/sections/*/exams')) active @endif">
                        Exams
                    </a>
                </li>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/students" class="@if (Request::is('teacher/sections/*/students')) active @endif">
                        Students
                    </a>
                </li>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/settings" class="@if (Request::is('teacher/sections/*/settings')) active @endif">
                        Settings
                    </a>
                </li>
            </ul>
        </nav>

        {{-- class content --}}
        <div class="class-content">

            {{-- exam creator form --}}
            <form action="" method="POST" class="exam-creator-form">
                @csrf

                {{-- exam header --}}
                <div class="exam-header">

                    <div class="exam-header-control">

                        <div class="exam-title">
                            <input type="text" name="title" id="title" placeholder="Exam title">
                        </div>

                        <div class="exam-description">
                            <input type="text" placeholder="Add description">
                        </div>
                    </div>


                    <div class="exam-save-control">

                        <button class="button">Save</button>

                    </div>


                </div>

                {{-- exam content --}}
                <div class="exam-content">
                    {{-- <x-exam-creator.multiple-choice />

                    <x-exam-creator.short-answer />

                    <x-exam-creator.coding /> --}}

                </div>

                {{-- add question wrapper and button --}}
                <div class="exam-add-question-wrapper">
                    <button type="button" class="exam-add-question-button button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" d="M12 8v4m0 0v4m0-4h4m-4 0H8" />
                                <circle cx="12" cy="12" r="10" />
                            </g>
                        </svg>
                    </button>
                </div>


            </form>

        </div>

    </div>
@endsection

@section('page_script')
    <script src="{{ asset('js/exam-creator.js') }}"></script>
@endsection
