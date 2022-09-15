@extends('layouts.teacher')

@section('page_title', 'Section | IT Exam System')

@section('page_style')
    <style>
        /* body */
        body {
            overflow: hidden;
        }

        /* main */
        main {
            overflow-y: auto;
        }

        /* content */
        div#content {
            position: relative;
            padding: 1.25rem;
        }

        /* section nav */
        .section-nav {
            position: sticky;
            top: 0;
            background-color: #04061F60;

            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .section-nav>.section-name {
            padding: .25rem;
            color: var(--white);
        }

        .section-nav>ul {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: .25rem;
            list-style: none;
        }

        .section-nav>ul>li>a {
            padding-inline: .75rem;
            height: 100%;
            display: block;
            text-decoration: none;
            transition: all ease-in-out .3s;
            color: var(--white);

        }

        .section-nav>ul>li>a:hover {
            background-color: var(--primary-hover);
        }

        /* class content */
        .class-content {
            padding-block: .75rem;
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

    <div id="content">

        {{-- navbar --}}
        <nav class="section-nav">

            <div class="section-header">
                <h2 class="section-name">{{ $section->section_name }}</h2>
                <div class="section-course">{{ $section->course }}</div>
            </div>

            <ul>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/class" class="@if (Request::is('/teacher/sections/*/class')) active @endif">Class</a>
                </li>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/exams">Exams</a>
                </li>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/students">Students</a>
                </li>
                <li>
                    <a href="/teacher/sections/{{ $section->id }}/settings">Settings</a>
                </li>
            </ul>
        </nav>

        <div class="class-content">

        </div>


    </div>

@endsection
