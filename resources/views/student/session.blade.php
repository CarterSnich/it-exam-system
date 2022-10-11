@extends('layouts.student')


@section('page_style')
    <style>
        #content {
            padding: 1.25rem;
            height: 100%;
            overflow: auto;
            text-align: center
        }

        .exam {
            display: flex;
            flex-direction: column;
        }

        .exam-item {
            border: 1px solid white;
            padding: 1.25rem
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

        <h2>{{ $title }}</h2>
        <p>{{ $description }}</p>


        <form id="exam-form" class="exam">
            @csrf
            @foreach ($items as $item)
                <div class="exam-item">

                    <h4>{{ $item['question'] }}</h4>

                    @switch($item['type'])
                        @case('multiple-choice')
                            <div class="exam-options {{ $item['type'] }}" data-item-type="{{ $item['type'] }}" data-multiple-choice-id="{{ $id = Str::random(30) }}">
                                @foreach ($item['options'] as $option)
                                    <label for="{{ $id . '-' . $loop->iteration }}">
                                        <input type="radio" id="{{ $id . '-' . $loop->iteration }}" name="{{ $id }}">
                                        {{ $option['name'] }}
                                    </label>
                                @endforeach
                            </div>
                        @break

                        @case('short-answer')
                            <div class="exam-options {{ $item['type'] }}" data-item-type="{{ $item['type'] }}">
                                <input type="text">
                            </div>
                        @break
                    @endswitch

                </div>
            @endforeach
        </form>

        <div>
            <button type="submit" form="exam-form">Submit</button>
        </div>

    </div>
@endsection


@section('page_script')
    <script src="{{ asset('js/exam-session.js') }}"></script>
@endsection
