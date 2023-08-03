<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                    <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/5553050/pexels-photo-5553050.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                @endif
                
            </figure>

            <div class="text-white">
                <h1 class="text-4xl font-bold mb-4">{{$course->title}}</h1>
                <h2 class="text-xl mb-4">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class=""></i> Categoría: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{$course->students_count}}</p>
                <p><i class="far fa-star"></i> Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Ocurrió un error!</strong>
                    <span class="block sm:inline">{{session('info')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg x-on:click="open=false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2 text-gray-600">Descripción del Curso</h1>

                <div class="text-gray-700 text-base ml-4">
                    {!! $course->description !!}
                </div>
            </section>

            <section class="card mb-12">
                <h1 class="font-bold text-3xl mb-2 text-gray-600">Objetivos del Curso</h1>
                
                <div class="card-body">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base flex space-x-2 sm:space-x-4"><i class="fas fa-check-circle text-blue-600 mr-2"></i> {{$goal->name}}</li>
                        @empty
                            <li class="text-gray-700 text-base">Este curso aún no cuenta con objetivos establecidos</li>
                        @endforelse
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2 text-gray-600">Temario del Curso</h1>

                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow"
                        @if ($loop->first)
                            x-data="{ open: true }"
                        @else
                            x-data="{ open: false }"
                        @endif>

                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-300" x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base mb-1" ><i class="fas fa-play-circle text-blue-600 mr-2"></i> {{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">
                            Este curso aún no cuenta con un temario
                        </div>
                    </article>
                @endforelse
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl mb-2 text-gray-600">Requisitos del Curso</h1>
                
                <ul class="list-disc list-inside ml-4">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base space-x-2 sm:space-x-4 md-12">{{$requirement->name}}</li>
                    @empty
                        <li class="text-gray-700 text-base">Este curso aún no presenta requisitos</li>
                    @endforelse
                </ul>
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">

                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name,'')}}</a>
                        </div>
                    </div>

                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button class="font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700 text-white block text-center w-full mt-4" type="submit">Aprobar Curso</button>
                    </form>

                    <a href="{{route('admin.courses.observation', $course)}}" class="btn btn-danger w-full block text-center mt-4">Observar Curso</a>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>