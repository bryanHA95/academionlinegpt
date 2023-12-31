<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/cursos/student-gb37b1d1d1_1920.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Los Mejores Cursos de Programación y TICS Gratuitas</h1>
                <p class="text-white text-lg mt-2 mb-4">Si deseas comenzar en el mundo del desarrollo de software, te encuentras en el lugar adecuado. Encuentra diferentes cursos y proyectos en esta plataforma.</p>

                @livewire('search');
            </div>
        </div>
    </section>

    @livewire('courses-index')
</x-app-layout>