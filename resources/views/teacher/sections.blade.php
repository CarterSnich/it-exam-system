@extends('layouts.teacher')

@section('page_title', 'Classes | IT Exam System')

@section('page_style')
    <style>
        /* content */
        div#content {
            overflow-y: auto;

            display: flex;
            flex-flow: column;
            padding: 1.25rem;
            gap: 1.25rem;
        }


        .card {
            max-height: 156px;
            height: 156px;
            width: 100%;
            min-width: 300px;
            border-radius: 0.5rem;
            background-repeat: no-repeat;
            background-blend-mode: overlay;
            background-size: 100% 100%;
            background-color: #04061F60;
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(2px);
            text-decoration: none;
            color: var(--white);
            transition: all ease-in-out .3s;
            display: flex;
            flex-flow: column;
            justify-content: space-between;
        }

        .card.banner_default {
            background-image: url(../../img/banner_default.png);
        }

        .card.banner_blue {
            background-image: url(../../img/banner_blue.png);
        }

        .card.banner_green {
            background-image: url(../../img/banner_green.png);
        }

        .card.banner_pink {
            background-image: url(../../img/banner_pink.png);
        }

        .card.banner_orange {
            background-image: url(../../img/banner_orange.png);
        }

        .card.banner_cyan {
            background-image: url(../../img/banner_cyan.png);
        }

        .card.banner_purple {
            background-image: url(../../img/banner_purple.png);
        }

        .card.banner_lightblue {
            background-image: url(../../img/banner_lightblue.png);
        }

        .card.banner_grey {
            background-image: url(../../img/banner_grey.png);
        }

        .card:hover {
            background-blend-mode: lighten;
            text-decoration: underline;
        }

        .card-header {
            font-size: large;
            padding: 1.25rem;
        }

        .card-body {
            display: flex;
            flex-flow: column;
            justify-content: end;
            padding: 1.25rem;
            gap: .25rem
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

        {{-- cards --}}
        @if ($sections->count())
            @foreach ($sections as $section)
                <a href="/teacher/sections/{{ $section->id }}/class" class="card {{ $section->color_code ?? 'banner_default' }}">
                    <div class="card-header">
                        {{ $section->section_name }}
                    </div>
                    <div class="card-body">
                        {{ $section->course }}
                    </div>
                </a>
            @endforeach
        @else
            <div class="empty-area">
                <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-opacity="0" d="M17 14V17a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V14z">
                        <animate fill="freeze" attributeName="fill-opacity" begin="0.8s" dur="0.15s" values="0;0.3" />
                    </path>
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path stroke-dasharray="48" stroke-dashoffset="48" d="M17 9v9a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V9z">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0" />
                        </path>
                        <path stroke-dasharray="14" stroke-dashoffset="14" d="M17 14H20C20.55 14 21 13.55 21 13V10C21 9.45 20.55 9 20 9H17">
                            <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s" dur="0.2s" values="14;28" />
                        </path>
                    </g>
                    <mask id="svgIDa">
                        <path fill="none" stroke="#fff" stroke-width="2" d="M8 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4M12 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4M16 0c0 2-2 2-2 4s2 2 2 4-2 2-2 4 2 2 2 4">
                            <animateMotion calcMode="linear" dur="3s" path="M0 0v-8" repeatCount="indefinite" />
                        </path>
                    </mask>
                    <rect width="24" height="0" y="7" fill="currentColor" mask="url(#svgIDa)">
                        <animate fill="freeze" attributeName="y" begin="0.8s" dur="0.6s" values="7;2" />
                        <animate fill="freeze" attributeName="height" begin="0.8s" dur="0.6s" values="0;5" />
                    </rect>
                </svg>
                <p>Seems like there's nothing in here.</p>
            </div>
        @endif

    </div>

@endsection
