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
            gap: .25rem;
        }

        /* details wrapper */
        .details-wrapper {
            display: grid;
            grid-template-columns: 50% 50%;
        }

        .details-wrapper>div {
            display: flex;
            flex-direction: column;
            gap: .75rem;
        }

        /* detail group */
        .detail-group {
            display: flex;
            flex-direction: column;
            gap: .25rem;
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

        /* add-section-modal */
        .add-section-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: #00000080;
            display: grid;
            place-content: center;
        }

        /* add section form */
        .add-section-form {
            background-color: var(--primary-bg);
            backdrop-filter: blur(4px);
            border-radius: .5rem;
            padding: 1.25rem;
            width: 456px;
            box-shadow: var(--shadow-sm);
        }

        .add-section-form>h2 {
            margin-bottom: 1.25rem;
            text-align: center;
        }

        .add-section-form>div {
            display: grid;
            gap: .75rem;
        }

        /* input group */
        .input-group {
            display: grid;
            gap: .25rem;
        }

        .input-group:has(select) {
            position: relative;
        }

        .input-group:has(select)::after {
            content: url('data:image/svg+xml,%3Csvg xmlns="http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" width="16" height="16" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"%3E%3Cpath fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 9l8 8l8-8"%2F%3E%3C%2Fsvg%3E');
            position: absolute;
            right: .75rem;
            bottom: .5rem;
        }

        .form-buttons {
            display: flex;
            justify-content: end;
            gap: .25rem;
        }
    </style>
@endsection


{{-- content --}}
@section('page_content')
    <div class="page-header">
        <h2>
            Teacher information
        </h2>

        <div class="button-toolbar">
            <a href="/administration/teachers/add" class="button">Update info</a>
            <button class="button" type="button" id="add-section-button">Add section</button>
        </div>
    </div>

    {{-- details --}}
    <div class="details-wrapper">

        {{-- left --}}
        <div>
            {{-- full name --}}
            <div class="detail-group">
                <label>Full name</label>
                <h3>
                    {{ $teacher->lastname }}, {{ $teacher->firstname }} {{ $teacher->middlename }}
                </h3>
            </div>
            {{-- gender --}}
            <div class="detail-group">
                <label>Gender</label>
                <h3>
                    {{ ucfirst($teacher->gender) }}
                </h3>
            </div>
            {{-- date of birth --}}
            <div class="detail-group">
                <label>Date of birth</label>
                <h3>
                    {{ date('F j, Y', strtotime($teacher->date_of_birth)) }}
                </h3>
            </div>
        </div>

        {{-- right --}}
        <div>

            {{-- Email --}}
            <div class="detail-group">
                <label>Email</label>
                <h3>
                    {{ $teacher->email }}
                </h3>
            </div>

            {{-- mobile number --}}
            <div class="detail-group">
                <label>Mobile number</label>
                <h3>
                    {{ preg_replace('/(09[0-9]{2})([0-9]{3})([0-9]{4})/', '$1-$2-$3', $teacher->mobile_no) }}
                </h3>
            </div>

            {{-- address --}}
            <div class="detail-group">
                <label>Address</label>
                <h3>
                    {{ $teacher->address }}
                </h3>
            </div>

        </div>

    </div>


    {{-- table wrapper --}}
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Section name</th>
                    <th>Year level</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                    <tr>
                        <td>
                            <a href="/sections/{{ $section->id }}">
                                {{ $section->section_name }}
                            </a>
                        </td>
                        <td>
                            <a href="/sections/{{ $section->id }}">
                                {{ yearLevelToWords($section->year_level) }}
                            </a>
                        </td>
                        <td>
                            <a href="/sections/{{ $section->id }}">
                                {{ $section->course }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- add section modal --}}
    <div class="add-section-modal" style="display: none">
        {{-- add section form --}}
        <form action="/administration/teachers/{{ $teacher->id }}/section/add" method="POST" class="add-section-form">
            @csrf

            <h2>Add section</h2>

            <div>
                {{-- section name --}}
                <div class="input-group">
                    <label for="section_name">Section name</label>
                    <input type="text" class="input" name="section_name" id="section_name" required>
                </div>
                {{-- year level --}}
                <div class="input-group">
                    <label for="year_level">Year level</label>
                    <select class="select" name="year_level" id="year_level" required>
                        <option value="" disabled selected>Select year level</option>
                        <option value="1">First Year</option>
                        <option value="2">Second Year</option>
                        <option value="3">Third Year</option>
                        <option value="4">Fourth Year</option>
                    </select>
                </div>
                {{-- course --}}
                <div class="input-group">
                    <label for="course">Course</label>
                    <input type="text" class="input" name="course" id="course" required>
                </div>
                {{-- form buttons --}}
                <div class="form-buttons">
                    <button type="submit" class="button">Submit</button>
                    <button type="reset" class="button">Cancel</button>
                </div>

            </div>

        </form>

    </div>

@endsection

@section('page_script')
    <script>
        $('#add-section-button').on('click', function() {
            $('.add-section-modal').fadeIn(300);
        })

        $('.add-section-form').on('reset', function(e) {
            $('.add-section-modal').fadeOut(300)
        })
    </script>
@endsection
