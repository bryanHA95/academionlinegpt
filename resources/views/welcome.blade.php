<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/coding-gc75b43889_12801.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Aprende las tecnologías de programación en AcademiOnlineGPT</h1>
                <p class="text-white text-lg mt-2 mb-4">En AcademiOnlineGPT encontrarás cursos y manuales que te ayudarán en tu formación de desarrollo de software y TICS</p>

                @livewire('search');
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6 font-bold">CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/startup-g765c0ba4c_640.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700 font-bold">Cursos</h1>
                </header>

                <p class="text-sm text-gray-500 text-center">Encuentra los mejores cursos sobre desarrollo de software, automatización de procesos e inteligencia artificial</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/paper-623167_1280.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700 font-bold">Guias</h1>
                </header>

                <p class="text-sm text-gray-500 text-center">Sigue paso a paso la instalación de programas y su uso general para la solución de casos prácticos</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/open-g44643766e_640.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700 font-bold">Blog</h1>
                </header>

                <p class="text-sm text-gray-500 text-center">Revisa los artículos sobre la actualidad de la programación, procesos e inteligencia artificial</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/ux-787980_1280.jpg') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700 font-bold">Proyectos</h1>
                </header>

                <p class="text-sm text-gray-500 text-center">Crea softwares para diferentes rubros en lenguajes de programación de escritorio y web</p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl font-bold">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white">Observa el catálogo de cursos por categoría o nivel</p>

        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catálogo de Cursos
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl test-gray-600 font-bold">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">La plataforma se actualiza de forma constante</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach

        </div>
    </section>
</x-app-layout>