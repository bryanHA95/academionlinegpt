<div class="container py-8">
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-input flex-1 shadow-sm" placeholder="Introduzca nombre de un curso ...">

            <a class="btn btn-danger ml-2 text-center" href="{{route('instructor.courses.create')}}">Crear Nuevo Curso</a>
        </div>

        @if ($courses->count())
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">NOMBRE</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">MATRICULADOS</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">CALIFICACIÓN</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">ESTADO</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                    @foreach ($courses as $course)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-10 w-10">
                                    @isset($course->image)
                                        <img class="h-full w-full rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt=""/>
                                    @else
                                        <img class="h-full w-full rounded-full object-cover object-center" src="https://images.pexels.com/photos/5553050/pexels-photo-5553050.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt=""/>
                                    @endisset
                                    
                                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{$course->title}}</div>
                                    <div class="text-gray-400">{{$course->category->name}}</div>
                                </div>
                            </th>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                                <div class="text-sm text-gray-500">Alumnos Matriculados</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 flex items-center">
                                    {{$course->rating}}

                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i class="fas fa-star {{$course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star {{$course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star {{$course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star {{$course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star {{$course->rating == 5 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración del Curso</div>
                            </td>

                            <td class="px-6 py-4">

                                @switch($course->status)
                                    @case(1)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span> Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-2 py-1 text-xs font-semibold text-yellow-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-600"></span> Revisión
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span> Publicado
                                        </span>
                                        @break
                                    @default
                                        
                                @endswitch
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a x-data="{ tooltip: 'Edite' }" href="{{route('instructor.courses.edit', $course)}}">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-6 w-6"
                                            x-tooltip="tooltip"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
        @else
            <div class="px-6 py-4">
                No hay registro coincidentes
            </div>
        @endif
        
    </x-table-responsive>
</div>
