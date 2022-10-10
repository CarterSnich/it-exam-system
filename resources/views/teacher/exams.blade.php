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
@endsection

@section('page_content')

    <div class="theme-bg theme-{{ $section->theme_color }}"></div>

    <div id="content">

        {{-- navbar --}}
        <x-teacher.section-nav :sectionName="$section->section_name" :course="$section->course" :sectionId="$section->id" />


        <div class="class-content">

            <table>
                <thead>
                    <tr>
                        <th>Exam</th>
                        <th>Date created</th>
                        <th>Status</th>
                        <th>Submissions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @for ($i = 0; $i < 50; $i++)
                        <tr>
                            <td>
                                <a href="#">
                                    {{ $i }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    {{ $i }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    {{ $i }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    {{ $i }}
                                </a>
                            </td>
                        </tr>
                    @endfor --}}

                    @foreach ($exams as $exam)
                        <tr>
                            <td>
                                <a href="#">
                                    {{ $exam->exam }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    {{ date('F j, Y', strtotime($exam->created_at)) }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    {{ $exam->open ? 'Open' : 'Closed' }}
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    {{ $teacher->address }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    {{-- create exam button --}}
    <a href="/teacher/sections/{{ $section->id }}/exams/create" class="create-exam-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="m16.474 5.408l2.118 2.117m-.756-3.982L12.109 9.27a2.118 2.118 0 0 0-.58 1.082L11 13l2.648-.53c.41-.082.786-.283 1.082-.579l5.727-5.727a1.853 1.853 0 1 0-2.621-2.621Z" />
                <path d="M19 15v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h3" />
            </g>
        </svg>
    </a>

@endsection
