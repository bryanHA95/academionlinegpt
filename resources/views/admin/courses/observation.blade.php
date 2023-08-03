@extends('adminlte::page')

@section('title', 'AcademiOnline GPT')

@section('content_header')
    <h1><strong>Observaciones del Curso: {{$course->title}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}

                <div class="form-group">
                    {!! Form::label('body', 'Observaciones del Curso') !!}
                    {!! Form::textarea('body', null) !!}

                    @error('body')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop