<div class="card" x-data="{open: false}">
    <div class="card-body bf-gray-100">
        <header>
            <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Recursos de la Lección:</strong></h1>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->resource)
                    <div class="flex justify-between items-center">
                        <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                        <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                    </div>
                @else
                    <form wire:submit.prevent="save">
                        <div class="flex items-center">
                            <input wire:model="file" type="file" class="form-input flex-1">
                            <button type="submit" class="font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700 text-white text-sm ml-2">Guardar</button>
                        </div>

                        <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                            Cargando ...
                        </div>

                        @error('file')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @endif   
            </div>
        </header>
    </div>
</div>