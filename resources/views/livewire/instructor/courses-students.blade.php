<div>
    <h1 class="text-2xl font-bold mb-4">ESTUDIANTES DEL CURSO</h1>

    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:model="search" class="form-input w-full shadow-sm" placeholder="Buscar estudiante ...">
        </div>

        @if ($students->count())
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">NOMBRE</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">CORREO</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                    @foreach ($students as $student)
                        <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt=""/>
                                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{$student->name}}</div>
                                </div>
                            </th>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{$student->email}}</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                </div>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4">
                {{$students->links()}}
            </div>
        @else
            <div class="px-6 py-4">
                No hay registro coincidentes
            </div>
        @endif
        
    </x-table-responsive>
</div>
