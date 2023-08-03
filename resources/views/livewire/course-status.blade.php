<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>

            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>

            @if ($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>
            @endif

            <div class="flex justify-between mt-4">
                {{-- Marcar como culminado --}}
                <div class="flex items-center cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-green-600"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                    @endif
                    
                    <p class="text-sm ml-2">Marcar la lección como culminada</p>
                </div>

                @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg"></i>
                        <p class="text-sm ml-2">Descargar recursos de la lección</p>
                    </div>    
                @endif
            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema Anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente Tema</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>

                <div class="flex items-center">
                    <figure class="flex-shrink-0 mr-4">
                        <img class="w-12 h-12 object-cover rounded-full" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div class="ml-2">
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                <div class="relative pt-1 mt-4">
                    <div class="flex mb-2 items-center justify-between">
                      <div>
                        @if (($this->advance >= 0) && ($this->advance < 20))
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-red-200">Iniciando</span>
                        @elseif (($this->advance >= 20) && ($this->advance < 40))
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-orange-600 bg-orange-200">En Progreso</span>
                        @elseif (($this->advance >= 40) && ($this->advance < 60))
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-600 bg-yellow-200">En Progreso</span>
                        @elseif (($this->advance >= 60) && ($this->advance < 80))
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-lime-600 bg-lime-200">En Progreso</span>
                        @elseif (($this->advance >= 80) && ($this->advance < 100))
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">En Progreso</span>
                        @else
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200">Completado</span>
                        @endif
                      </div>

                      <div class="text-right">
                        @if (($this->advance >= 0) && ($this->advance < 20))
                            <span class="text-xs font-semibold inline-block text-red-600">{{$this->advance . '%'}} completado</span>
                        @elseif (($this->advance >= 20) && ($this->advance < 40))
                        <span class="text-xs font-semibold inline-block text-orange-600">{{$this->advance . '%'}} completado</span>
                        @elseif (($this->advance >= 40) && ($this->advance < 60))
                        <span class="text-xs font-semibold inline-block text-yellow-600">{{$this->advance . '%'}} completado</span>
                        @elseif (($this->advance >= 60) && ($this->advance < 80))
                        <span class="text-xs font-semibold inline-block text-lime-600">{{$this->advance . '%'}} completado</span>
                        @elseif (($this->advance >= 80) && ($this->advance < 100))
                        <span class="text-xs font-semibold inline-block text-green-600">{{$this->advance . '%'}} completado</span>
                        @else
                        <span class="text-xs font-semibold inline-block text-blue-600">{{$this->advance . '%'}} completado</span>
                        @endif                        
                      </div>
                    </div>
                    
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        @if (($this->advance >= 0) && ($this->advance < 20))
                            <div style="width: {{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500 transition-all duration-500"></div>
                        @elseif (($this->advance >= 20) && ($this->advance < 40))
                            <div style="width: {{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500 transition-all duration-500"></div>
                        @elseif (($this->advance >= 40) && ($this->advance < 60))
                            <div style="width: {{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-400 transition-all duration-500"></div>
                        @elseif (($this->advance >= 60) && ($this->advance < 80))
                            <div style="width: {{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-lime-500 transition-all duration-500"></div>
                        @elseif (($this->advance >= 80) && ($this->advance < 100))
                            <div style="width: {{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500 transition-all duration-500"></div>
                        @else
                            <div style="width: {{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                        @endif
                    </div>
                  </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2">{{$section->name}}</a>

                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>    
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                            
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>