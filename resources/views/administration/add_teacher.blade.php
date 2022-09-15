@extends('layouts.administration')

@section('page_title', 'Dashboard | IT Exam System')

@section('page_style')

    <style>
        /* content */
        div.content {
            display: flex;
            flex-flow: column;
            gap: .75rem;
        }

        /* page header */
        .page-header {
            display: flex;
            justify-content: space-between
        }

        /* button toolbar */
        .button-toolbar>a {
            color: var(--white);
        }

        .button-toolbar>a:active {
            color: black !important;
        }

        /* form */
        form {
            display: grid;
            gap: 1.25rem;
        }

        /* form-section */
        .form-section>hr {
            margin-block: .25rem .75rem;
        }

        /* inputs section */
        .inputs-section {
            display: flex;
            flex-direction: row;
            gap: .75rem;
        }

        .inputs-section>* {
            flex: 1
        }

        /* input group */
        .input-group {
            display: flex;
            flex-direction: column;
            gap: .25rem;
        }

        /* form button */
        .form-buttons {
            display: flex;
            flex-direction: row;
            justify-content: end;
            gap: .25rem;
        }
    </style>

@endsection


{{-- content --}}
@section('page_content')
    <div class="page-header">
        <h2>Add teacher</h2>


    </div>

    {{-- form --}}
    <form action="/administration/teachers/add" method="POST">
        @csrf

        {{-- name --}}
        <div class="form-section">
            <h4>Name</h4>
            <hr>
            <div class="inputs-section">
                <div class="input-group">
                    <label for="lastname">Last name</label>
                    <input type="text" class="input" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                </div>
                <div class="input-group">
                    <label for="firstname">First name</label>
                    <input type="text" class="input" name="firstname" id="firstname" value="{{ old('firstname') }}" required>
                </div>
                <div class="input-group">
                    <label for="middlename">Middle name</label>
                    <input type="text" class="input" name="middlename" id="middlename" value="{{ old('middlename') }}">
                </div>
            </div>

        </div>

        {{-- other information --}}
        <div class="form-section">
            <h4>Other information</h4>
            <hr>
            <div class="inputs-section">
                <div class="input-group">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="date" class="input" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required>
                </div>
                <div class="input-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="select" required>
                        <option value="" disabled selected>Select gender</option>
                        <option value="male" @if (old('gender') == 'male') selected @endif>Male</option>
                        <option value="female" @if (old('gender') == 'female') selected @endif>Female</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- contact details --}}
        <div class="form-section">
            <h4>Contact details</h4>
            <hr>
            <div class="inputs-section">
                {{-- email --}}
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" class="input" name="email" id="email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="{{ old('email') }}" required>
                </div>
                {{-- mobile number --}}
                <div class="input-group">
                    <label for="mobile_no">Mobile number</label>
                    <input type="text" class="input" name="mobile_no" id="mobile_no" pattern="09[0-9]{9}" value="{{ old('mobile_no') }}" required>
                </div>
            </div>
        </div>

        {{-- location details --}}
        <div class="form-section">
            <h4>Location details</h4>
            <hr>
            <div class="inputs-section">
                <div class="input-group">
                    <label for="address">Address</label>
                    <input type="text" class="input" name="address" id="address" value="{{ old('address') }}" required>
                </div>
            </div>
        </div>

        {{-- submit button --}}
        <div class="form-buttons">
            <button class="button" type="submit">Submit</button>
            <a class="button" href="/administration/teachers">Cancel</a>
        </div>

    </form>

@endsection
