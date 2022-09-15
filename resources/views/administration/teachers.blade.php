@extends('layouts.administration')

@section('page_title', 'Teachers | IT Exam System')

@section('page_style')
    <style>
        /* content */
        .content {
            display: flex;
            flex-flow: column;
            gap: .75rem;
        }

        /* page header */
        .page-header {
            position: relative;
            display: flex;
            justify-content: space-between
        }


        /* button toolbar */
        .button-toolbar {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .button-toolbar>a {
            content: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"%3E%3Cg fill="none" stroke="%23dfe0e3" stroke-width="2"%3E%3Cpath stroke-linecap="round" d="M12 8v4m0 0v4m0-4h4m-4 0H8"%2F%3E%3Ccircle cx="12" cy="12" r="10"%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E');
            height: 32px;
            width: 32px;
            transition: all ease-in-out .3s;
        }

        .button-toolbar>a:hover {
            content: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"%3E%3Cpath fill="rgba(255%2C 255%2C 255%2C 0.8666666666666667)" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3Z" clip-rule="evenodd"%2F%3E%3C%2Fsvg%3E');
        }

        .button-toolbar>a:active {
            content: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"%3E%3Cpath fill="rgba(255%2C 255%2C 255%2C 0.3137254901960784)" fill-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1Zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3Z" clip-rule="evenodd"%2F%3E%3C%2Fsvg%3E');
        }

        /* paginator */
        .paginator {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            translate: -50% 0;
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        .paginator>a {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: .25rem .75rem;
            text-decoration: none;
            color: var(--white);
            border: 1px solid var(--primary-color);
            margin-left: -1px;
        }

        .paginator>a:first-child {
            padding: .25rem .5rem;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }

        .paginator>a:last-child {
            padding: .25rem .5rem;
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem;
        }

        .paginator>a.disabled {
            pointer-events: none;
            color: var(--disabled-color);
        }

        .paginator>a:hover:not(.active) {
            color: var(--primary-color);
            background-color: var(--white-hover);
        }

        .paginator>a:active {
            color: black !important;
            background-color: var(--white-active) !important;
        }

        .paginator>a.active {
            pointer-events: none;
            background-color: var(--white-current);
        }


        /* table wrapper */
        .table-wrapper {
            overflow-y: auto;
        }

        /* table */
        table {
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
            padding: .75rem;
            background-color: #00000080;
            backdrop-filter: blur(4px);
        }

        table>tbody>tr {
            transition: background-color ease-in-out .3s;
        }

        table>tbody>tr:hover {
            background-color: #ffffff50;
        }

        table>tbody>tr>td {
            padding: .75rem;
        }

        table>tbody>tr>td>a {
            display: block;
            text-decoration: none;
            color: var(--white);
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
    </style>
@endsection


{{-- content --}}
@section('page_content')
    <div class="page-header">
        <h2>Teachers</h2>


        {{-- paginator --}}
        <div class="paginator">
            {{-- previous --}}
            <a href="{{ $teachers->previousPageUrl() }}" title="Previous" @if ($teachers->onFirstPage()) class="disabled" @endif>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 4l-8 8l8 8" />
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m20 4l-8 8l8 8" />
                </svg>
            </a>
            {{-- page links --}}
            @for ($i = 1; $i <= $teachers->lastPage(); $i++)
                <a href="{{ $teachers->url($i) }}" @if ($i == $teachers->currentPage()) class="active" @endif>{{ $i }}</a>
            @endfor
            {{-- next --}}
            <a href="{{ $teachers->nextPageUrl() }}" title="Next" @if ($teachers->onLastPage()) class="disabled" @endif>
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 4l8 8l-8 8" />
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14 4l8 8l-8 8" />
                </svg>
            </a>
        </div>


        <div class="button-toolbar">
            <a href="/administration/teachers/add" title="Add"></a>
        </div>
    </div>

    {{-- table wrapper --}}
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>
                            <a href="/administration/teachers/{{ $teacher->id }}">
                                {{ $teacher->lastname }}, {{ $teacher->firstname }} {{ $teacher->middlename ? $teacher->middlename[0] . '.' : '' }}
                            </a>
                        </td>
                        <td>
                            <a href="/administration/teachers/{{ $teacher->id }}">
                                {{ $teacher->email }}
                            </a>
                        </td>
                        <td>
                            <a href="/administration/teachers/{{ $teacher->id }}">
                                {{ Str::ucfirst($teacher->gender) }}
                            </a>
                        </td>
                        <td>
                            <a href="/administration/teachers/{{ $teacher->id }}">
                                {{ $teacher->address }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
