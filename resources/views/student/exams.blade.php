@extends('layouts.student')


@section('page_style')
    <style>
        #content {
            padding: 1.25rem;
            height: 100%;
            overflow: auto
        }

        .card-group {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 1.25rem;
        }

        .card {
            isolation: isolate;
            height: 300px;
            border-radius: .5rem;
            padding: .75rem;

            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            color: white;

            position: relative;
            overflow: hidden;
        }

        .sp {
            filter: blur(4px);
            position: absolute;
            inset: 0;
            background-position: bottom right;
            background-repeat: no-repeat;
            z-index: -1;
        }

        .sp-default {
            background-image: var(--sp-default);
            background-color: var(--sp-color-default);
        }

        .sp-blue {
            background-image: var(--sp-blue);
            background-color: var(--sp-color-blue);
        }

        .sp-green {
            background-image: var(--sp-green);
            background-color: var(--sp-color-green);
        }

        .sp-pink {
            background-image: var(--sp-pink);
            background-color: var(--sp-color-pink);
        }

        .sp-orange {
            background-image: var(--sp-orange);
            background-color: var(--sp-color-orange);
        }

        .sp-cyan {
            background-image: var(--sp-cyan);
            background-color: var(--sp-color-cyan);
        }

        .sp-purple {
            background-image: var(--sp-purple);
            background-color: var(--sp-color-purple);
        }

        .sp-lightblue {
            background-image: var(--sp-lightblue);
            background-color: var(--sp-color-lightblue);
        }

        .sp-grey {
            background-image: var(--sp-grey);
            background-color: var(--sp-color-grey);
        }
    </style>
@endsection

@section('page_content')
    <div id="content">
        <div class="card-group">

            @foreach ($exams as $exam)
                <a href="/student/exams/{{ $exam->id }}" class="card">
                    <h4>{{ $exam->title }}</h4>
                    <p>{{ $exam->description }}</p>

                    <div class="sp sp-default"></div>
                </a>
            @endforeach
        </div>
    </div>
@endsection


@section('page_script')
@endsection
