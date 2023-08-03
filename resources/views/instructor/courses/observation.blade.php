<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold">OBSERVACIONES DEL CURSO</h1>
    <hr>

    <div class="text-gray-500">
        {!! $course->observation->body !!}
    </div>
</x-instructor-layout>