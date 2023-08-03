<x-app-layout>

    <div class="container py-8">
        @if (session('info'))
            <div class="bg-blue-100 text-blue-600 p-2" role="alert">
                <strong>¡Perfecto!</strong> {{session('info')}}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
                <hr class="mt-2 mb-6">
    
                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
    
                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    @include('instructor.courses.partials.form')

                    <div class="flex justify-end">
                        {!! Form::submit('Crear Nuevo Curso', ['class' => 'font-bold py-2 px-4 rounded bg-blue-500 text-white cursor-pointer hover:bg-blue-700']) !!}
                    </div>
    
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script>
            //Slug Automático
            document.getElementById("title").addEventListener('keyup', slugChange);

            function slugChange()
            {
                title = document.getElementById("title").value;
                document.getElementById("slug").value = slug(title);
            }

            function slug(str)
            {
                var $slug = '';
                var trimmed = str.trim(str);

                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');

                return $slug.toLowerCase();
            }

            //CKEDITOR5
            ClassicEditor
                .create( document.querySelector( '#description' ), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                } )
                .catch( error => {
                    console.log( error );
                } );

            //Cambiar Imagen
            document.getElementById("file").addEventListener('change', cambiarImagen);

            function cambiarImagen(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = (event) => {
                    document.getElementById("picture").setAttribute('src', event.target.result);
                };

                reader.readAsDataURL(file);
            }
        </script>
    </x-slot>
</x-app-layout>