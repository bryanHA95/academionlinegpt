@extends('adminlte::page')

@section('title', 'AcademiOnline GPT')

@section('content_header')
    <h1><strong>AcademiOnline GPT</strong></h1>
@stop

@section('content')
    <div class="small-box bg-gradient-success">
        <div class="inner">
        <h3>Instructor</h3>
        <p>Ir a interfaz</p>
        </div>
        <div class="icon">
        <i class="fas fa-user-plus"></i>
        </div>
        <a href="{{ route('instructor.courses.index') }}" class="small-box-footer">
        Ir a... <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop