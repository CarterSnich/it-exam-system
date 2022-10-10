<nav class="section-nav">

    <div class="section-header">
        <h2 class="section-name">{{ $sectionName }}</h2>
        <div class="section-course">{{ $course }}</div>
    </div>

    <ul>
        <li>
            <a href="/teacher/sections/{{ $sectionId }}/class" class="@if (Request::is('teacher/sections/*/class')) active @endif">Class</a>
        </li>
        <li>
            <a href="/teacher/sections/{{ $sectionId }}/exams" class="@if (Request::is('teacher/sections/*/exams')) active @endif">Exams</a>
        </li>
        <li>
            <a href="/teacher/sections/{{ $sectionId }}/students" class="@if (Request::is('teacher/sections/*/students') || Request::is('teacher/sections/*/students/add')) active @endif">
                Students
            </a>
        </li>
        <li>
            <a href="/teacher/sections/{{ $sectionId }}/settings" class="@if (Request::is('teacher/sections/*/settings')) active @endif">Settings</a>
        </li>
    </ul>
</nav>
